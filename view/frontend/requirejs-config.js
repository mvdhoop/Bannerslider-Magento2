var config = {
	map: {
		'*': {
			'magestore/note': 'Magestore_Bannerslider/js/jquery/slider/jquery-ads-note',
			'magestore/impress': 'Magestore_Bannerslider/js/report/impress',
			'magestore/clickbanner': 'Magestore_Bannerslider/js/report/clickbanner',
		},
	},
	paths: {
		'magestore/popup': 'Magestore_Bannerslider/js/jquery.bpopup.min',
		'magestore/owlcarousel': 'Magestore_Bannerslider/js/owl.carousel.min'
	},
	shim: {
		'magestore/zebra-tooltips': {
			deps: ['jquery']
		},
		'magestore/owlcarousel': {
			deps: ['jquery']
		},
	}
};
