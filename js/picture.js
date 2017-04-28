$(document).ready(function(){
	$(window).on("load",function(){
	imgLocation();	
	});
	
});

function imgLocation(){
	var box = $(".content");

	var boxWidth = box.eq(0).width();
	var num = Math.floor($(window).width()/boxWidth);
	var boxArr=[];
	console.log("==="+boxWidth);
	box.each(function(index, value){
		console.log(index+"+++++"+num);
		var boxHeight = box.eq(index).height();
		if (index<num) {
			boxArr[index] = boxHeight;
			console.log(boxHeight+"===="+num);
		}else{
			var minboxHeight = Math.min.apply(null, boxArr);
			var minboxIndex = $.inArray(minboxHeight, boxArr);
			console.log("131"+minboxIndex);

			$(value).css({
				"position":"absolute",
				"top":minboxHeight,
				"left":box.eq(minboxIndex).position().left
			});
			boxArr[minboxIndex] += box.eq(index).height();
		}
	});
}