myBar = $('#demo').progressbarManager({      
  totalValue : 100
});

myBar = $('#demo').progressbarManager({      

  // whether to log to console
  debug : false ,

  // for the default bar 
  currentValue : 0,

  // for the default bar 
  totalValue : 100 ,

  // for the default bar 
  style : 'primary' ,

  // for default bar
  animate : true ,

  // for default bar
  stripe : true ,

  // Progress element id
  id : 'pbm-bootsrap-progress-' +  $.fn.progressbarManager.GUID ,

  // prefix for the genrated bar id
  barIdPrefix : 'pbm-progress-bar-' ,

  // This option is for stacked progress bar. the total value of the progress
  total : opts.totalValue ,

  // Whether to create default bar
  addDefaultBar : true

});

