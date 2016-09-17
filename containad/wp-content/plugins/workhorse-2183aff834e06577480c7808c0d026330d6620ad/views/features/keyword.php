<?php
use WorkHorse\View;
?>

<?php View::startSection('breadcrumbs') ?>
	<a href="<?= admin_url('admin.php?page=workhorse') ?>">Work Horse</a>
	&raquo;
	<span>Keyword Generator</span>
<?php View::endSection('breadcrumbs') ?>

<?php View::startSection('content') ?>
	<h2>
		Keyword Generator
	</h2>

	<div class="notice notice-success is-dismissible">
		<p>
			The WorkHorse Keyword Generator takes a seed keyword and uses the Google autosuggest feature to generate a list of long tail keywords. You can put these long tail keywords into a WorkHorse List and make posts/pages for each keyword in the list!
		</p>
	</div>

	<div class="PostForm">
		<div>
			<input type="text" id="input" class="keyword_input" placeholder="Seed Keyword"></input>
		</div>
		<div>
	      <textarea id="output"  class="keyword_input" style="height: 400px;" placeholder="Results"></textarea>
	  </div>
		<div>
			<input id="startjob" onclick="generate();" type="button" class="button button-primary" value="Generate Keywords!">
	  </div>
	</div>

    <script>
    	var displayKeywords = [];
        var results = {};
        var initialKeywords = 0;
        var doWork = false;
        var queryKeywords = [];
        var queryKeywordsIndex = 0;
        var queryflag = false;

        function generate()
        {
            if(doWork == false) {
                queryKeywords = [];
                queryKeywordsIndex = 0;
                displayKeywords = [];
                results = {'': 1, ' ': 1, '  ': 1};

                var ks = jQuery('#input').val().split("\n");
                var i = 0;
                for(i = 0; i < ks.length; i++) {
                    queryKeywords[queryKeywords.length] = ks[i];
                    displayKeywords[displayKeywords.length] = ks[i];

                    var j = 0;
                    for(j = 0; j < 26; j++) {
                        var chr = String.fromCharCode(97 + j);
                        var currentx = ks[i] + ' ' + chr;
                        queryKeywords[queryKeywords.length] = currentx;
                        results[currentx] = 1;
                    }
                }

                initialKeywords = displayKeywords.length;

                doWork = true;
                jQuery('#startjob').val('Stop');
            }
            else {
                doWork = false;
                jQuery('#startjob').val('Start');
            }
        }

        function tick()
        {
            if(doWork == true && queryflag == false) {
                if(queryKeywordsIndex < queryKeywords.length) {
                    var currentKw = queryKeywords[queryKeywordsIndex];
                    query(currentKw);
                    queryKeywordsIndex++;
                }
                else {
                    if (initialKeywords != displayKeywords.length) {
                        doWork = false;
                        jQuery('#startjob').val('Start');
                    }
                    else {
                        queryKeywordsIndex = 0;
                    }
                }
            }
        }

        function query(keyword)
        {
            var querykeyword = keyword;
            var queryresult = '';
            queryflag = true;

            jQuery.ajax({
                url: 'http://suggestqueries.google.com/complete/search',
                jsonp: 'jsonp',
                dataType: 'jsonp',
                data: {
	                q: querykeyword,
	                client: 'chrome'
                },
                success: function(res) {
                    var retList = res[1];

                    for(var i = 0; i < retList.length; i++) {
                        var currents = clean(retList[i]);

                        if(results[currents] != 1) {
                            results[currents] = 1;
                            displayKeywords[displayKeywords.length] = clean(retList[i]);

                            queryKeywords[queryKeywords.length] = currents;

                            for(var j = 0; j < 26; j++) {
                                var chr = String.fromCharCode(97 + j);
                                var currentx = currents + ' ' + chr;
                                queryKeywords[queryKeywords.length] = currentx;
                                results[currentx] = 1;
                            }
                        }
                    }

                    display();
                    var textarea = document.getElementById("input");
                    textarea.scrollTop = textarea.scrollHeight;
                    queryflag = false;
                }
            });
        }

        function clean(input)
        {
            var val = input;
            val = val.replace("\\u003cb\\u003e", "");
            val = val.replace("\\u003c\\/b\\u003e", "");
            val = val.replace("\\u003c\\/b\\u003e", "");
            val = val.replace("\\u003cb\\u003e", "");
            val = val.replace("\\u003c\\/b\\u003e", "");
            val = val.replace("\\u003cb\\u003e", "");
            val = val.replace("\\u003cb\\u003e", "");
            val = val.replace("\\u003c\\/b\\u003e", "");
            val = val.replace("\\u0026amp;", "&");
            val = val.replace("\\u003cb\\u003e", "");
            val = val.replace("\\u0026", "");
            val = val.replace("\\u0026#39;", "'");
            val = val.replace("#39;", "'");
            val = val.replace("\\u003c\\/b\\u003e", "");
            val = val.replace("\\u2013", "2013");
            if (val.length > 4 && val.substring(0, 4) == "http") val = "";
            return val;
        }

        function display()
        {
            var sb = '';
            var outputKeywords = displayKeywords;
            for (var i = 0; i < outputKeywords.length; i++) {
                sb += outputKeywords[i];
                sb += '\n';
            }
            jQuery('#output').val(sb);
        }

        window.setInterval(tick, 750);
    </script>
<?php View::endSection('content') ?>

<?php View::make('layouts.main') ?>
