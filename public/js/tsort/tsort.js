(function($){
	$.fn.tsort=function(method){
		var
			v=function(e,i){return $(e).children('td').eq(i).text()},
			c=function(i){return function(a,b){var k=v(a,i),m=v(b,i);return $.isNumeric(k)&&$.isNumeric(m)?k-m:k.localeCompare(m)}};
		this.each(function(){
			var
				th=$(this).children('thead').first().find('tr > th'),
				tb=$(this).children('tbody').first(),
				link=th.children('a');

			if(method == 'stop') {
				link.unbind('click');
			} else {
				link.click(function(e){
					e.preventDefault();
					var r=tb.children('tr').toArray().sort(c($(this).parent().index()));
					th.removeClass('sel'),$(this).parent().addClass('sel').toggleClass('asc');
					if($(this).parent().hasClass('asc'))r=r.reverse();
					for(var i=0;i<r.length;i++)tb.append(r[i])
				})
			}
		})
	}
})(jQuery);