




window.addEventListener("load", function() {
	// helper func

	var get_pane = function(el) {
		while(el.className.indexOf("panel-pane") == -1) {
			el = el.parentElement;
		}
		return el;
	}


	// enhance taxonomy term reference trees
	var trees = document.querySelectorAll(".field-type-taxonomy-term-reference");
	trees.forEach(function(tree) {
		var pane = get_pane(tree);
		var head = pane.querySelector(".pane-title");
		var body = pane.querySelector(".pane-content");
		head.className += " ed_we_dropdown_head";
		body.className += " ed_we_dropdown_body";

		b_cs = window.getComputedStyle(body);
		body.style.height = b_cs.height;

		head.addEventListener("mouseup", function(e){
			if (body.hasAttribute("ed_we_dropdown_hidden")) {
				body.removeAttribute("ed_we_dropdown_hidden");
				head.setAttribute("ed_we_checked", "");
			} else {
				body.setAttribute("ed_we_dropdown_hidden", "");
				head.removeAttribute("ed_we_checked");
			}
		});

		body.setAttribute("ed_we_dropdown_hidden", "");
	});






});