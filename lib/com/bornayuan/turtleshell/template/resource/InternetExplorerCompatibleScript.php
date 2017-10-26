
<!-- IE Compatible Script -->
<!--[if lt IE 10]>
	<script>
		(function() {
		    var method;
		    var noop = function () {};
		    var methods = [
		        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
		        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
		        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
		        'timeStamp', 'trace', 'warn'
		    ];
		    var length = methods.length;
		    var console = (window.console = window.console || {});
		
		    while (length--) {
		        method = methods[length];
		
		        // Only stub undefined methods.
		        if (!console[method]) {
		            console[method] = noop;
		        }
		    }
		}());
	</script>
<![endif]-->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script>
	(function(){
		var ef = function(){};
		window.console = window.console || {log:ef,warn:ef,error:ef,dir:ef};
	}());
	</script>
	<script src="/bynca/js/html5shiv.min.js"></script>
	<script src="/bynca/js/html5shiv-printshiv.min.js"></script>
	<script src="/bynca/js/es5-shim.min.js"></script>
	<script src="/bynca/js/es5-sham.min.js"></script>
	<script src="/bynca/js/respond.min.js"></script>
<![endif]-->
