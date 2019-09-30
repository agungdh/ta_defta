window.Vue = require('vue');
window.axios = require('axios');

window.vpage = new Vue({
    el: '#page',
    data: {
      tableSorting: {
      	colNo: 1,
      	asc: true,
      },
      tableData: [],
      tableParam: {
      	search: '',
      	perPage: 5,
      	maxPage: 1,
      	page: 1,
      },
      tableParamPrev: {
      	search: null,
      	perPage: null,
      	maxPage: null,
      	page: null,
      },
      tableInfo: {
      	from: 0,
      	to: 0,
      	total: 0,
      },
      tableNav: {
      	first: false,
      	prev: false,
      	next: true,
      	last: true,
      },
      formData: {
        text1: '',
        text2: '',
        text3: '',
      },
    },
    methods: {
    	recall: function() {
    		let recall = false;

    		if (vpage.tableParam.search != vpage.tableParamPrev.search) {
    			vpage.tableParamPrev.search = vpage.tableParam.search;

    			recall = true;
    		}

    		if (vpage.tableParam.perPage != vpage.tableParamPrev.perPage) {
    			vpage.tableParamPrev.perPage = vpage.tableParam.perPage;

    			recall = true;
    		}

    		if (vpage.tableParam.page != vpage.tableParamPrev.page) {
    			vpage.tableParamPrev.page = vpage.tableParam.page;

    			recall = true;
    		}

    		if (recall) {
				vpage.call();
    		}
    	},
    	call: function() {
			axios.post(baseUrl + '/test/getTableData', {
		    perPage: vpage.tableParam.perPage,
		    search: vpage.tableParam.search,
		    sorting: {
			    colNo: vpage.tableSorting.colNo,
			    asc: vpage.tableSorting.asc,
		    },
		    page: vpage.tableParam.page,
		  })
		  .then(function (response) {
		    vpage.tableData = response.data.data;
		    vpage.tableParam.maxPage = response.data.last_page;
		    vpage.tableInfo.from = response.data.from;
		    vpage.tableInfo.to = response.data.to;
		    vpage.tableInfo.total = response.data.total;

		    vpage.setTableNav();
		  })
		  .catch(function (error) {
		    console.log(error);
		  });
    	},
    	sort: function(colNo) {
    		 if (vpage.tableSorting.colNo == colNo) {
    		 	vpage.tableSorting.asc = !vpage.tableSorting.asc;
    		 } else {
    		 	vpage.tableSorting.colNo = colNo;
    		 	vpage.tableSorting.asc = true;
    		 }

		 	vpage.call();
    	},
    	firstPage: function() {
    		vpage.tableParam.page = 1;

    		vpage.call();
    	},
    	nextPage: function() {
    		vpage.tableParam.page++;

    		vpage.call();
    	},
    	prevPage: function() {
    		vpage.tableParam.page--;

    		vpage.call();
    	},
    	lastPage: function() {
    		vpage.tableParam.page = vpage.tableParam.maxPage;

    		vpage.call();
    	},
    	setTableNav: function() {
    		if (vpage.tableParam.maxPage == 1) {
    			vpage.tableNav.first = false;
    			vpage.tableNav.prev = false;
    			vpage.tableNav.next = false;
    			vpage.tableNav.last = false;
    		} else if (vpage.tableParam.page >= vpage.tableParam.maxPage) {
    			vpage.tableNav.first = true;
    			vpage.tableNav.prev = true;
    			vpage.tableNav.next = false;
    			vpage.tableNav.last = false;    			
    		} else if (vpage.tableParam.page <= 1) {
    			vpage.tableNav.first = false;
    			vpage.tableNav.prev = false;
    			vpage.tableNav.next = true;
    			vpage.tableNav.last = true;
    		} else {
				vpage.tableNav.first = true;
				vpage.tableNav.prev = true;
				vpage.tableNav.next = true;
				vpage.tableNav.last = true;
    		}
    	}
    },
    mounted: function () {
		this.$nextTick(function () {
		 vpage.call();
		});
	}
});