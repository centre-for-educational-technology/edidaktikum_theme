


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


	// enhance fields wrapped with grade limiter
	var fields = document.querySelectorAll("[data-grade_limiter] input");
	var f_min = 1;
	var f_max = 100;
	fields.forEach(function(field) {
		field.type = "number";
		field.min = f_min;
		field.max = f_max;
		field.addEventListener("keyup", function() {
			if (field.value.length < 1) return;
			var val = Number(field.value);
			if (val > f_max) field.value = f_max;
			if (val < f_min) field.value = f_min;
		});
	});

	//	enhance averaging tables
	var tables = document.querySelectorAll("[data-averaging_table]");
	tables.forEach(function(table) {
		var t_average = table.getAttribute("data-averaging_table");

		//gather data
		var by_row = [];
		var by_col = [];

		var rows = table.querySelectorAll("tr");
		if (rows.length < 2) return;
		for (var y = 1; y < rows.length; y++) {
			var cols = rows[y].querySelectorAll("td");
			for (var x = 1; x < cols.length; x++) {
				var cell = cols[x];
				var xx = x - 1;
				var yy = y - 1;

				var val = Number(cell.innerText);
				val = isNaN(val) ? 0 : val;

				if (typeof by_row[yy] === 'undefined') by_row[yy] = [];
				by_row[yy][xx] = val;

				if (typeof by_col[xx] === 'undefined') by_col[xx] = [];
				by_col[xx][yy] = val;

			}
		}

		//concentrate into averages
		var conc1D = function(arr) {
			var total = 0;
			var count = 0;
			for (var i = 0; i < arr.length; i++) {
				if (arr[i] != 0) {
					total += arr[i];
					count++;
				}
			}
			return count == 0 ? "" : Math.round(total / count);
		}

		var conc2D = function(arr) {
			for (var i = 0; i < arr.length; i++) {
				arr[i] = conc1D(arr[i]);
			}
			return arr;
		}

		by_row = conc2D(by_row);
		by_col = conc2D(by_col);

		//present by_row data
		var th = document.createElement("th");
		th.innerHTML = t_average;
		rows[0].appendChild(th);

		for (var y = 1; y < rows.length; y++) {
			var cell = document.createElement("td");
			cell.innerHTML = by_row[y - 1];
			cell.className = "ed_we_at_cell";
			rows[y].appendChild(cell);
		}

		//present by_col data
		var tr = document.createElement("tr");
		tr.className = "even";
		tr.style = "border:none";
		rows[1].parentElement.appendChild(tr);
		var th2 = document.createElement("td");
		th2.innerHTML = t_average;
		tr.appendChild(th2);
		for (var x = 0; x < by_col.length; x++) {
			var td = document.createElement("td");
			td.innerHTML = by_col[x];
			td.className = "ed_we_at_cell";
			tr.appendChild(td);
		}
	});


	// enhance sticky headers
	var sticky_header_tables = document.querySelectorAll("[data-sticky_headers]");
	sticky_header_tables.forEach(function(table) {
		var side_headers = [];
		var rows = table.querySelectorAll("tr");
		for (var i = 0; i < rows.length; i++) {
			if (rows[i].childNodes.length < 1) continue;
			var header = rows[i].childNodes[0];	
			header.setAttribute("data-sticky_header", "");
			side_headers.push(header);

			// hack to get around current style mess
			if (i == 0) continue;
			header.style.background = getComputedStyle(rows[i]).background;	
		}
		
		var top_headers = [];
		for (var i = 0; i < rows[0].childNodes.length; i++) {
			var header = rows[0].childNodes[i];
			if (header.tagName != "TH") continue;
			header.setAttribute("data-sticky_header", "");
			top_headers.push(header);
		}

		var cr_corner = top_headers[0].getBoundingClientRect();
		var cr_table = table.getBoundingClientRect();
		var max_horizontal = cr_table.right - cr_table.left - cr_corner.right + cr_corner.left;
		var max_vertical = cr_table.bottom - cr_table.top - cr_corner.bottom + cr_corner.top;
		
		document.addEventListener("scroll", function() {
			var cr = table.getBoundingClientRect();
			var off_x = Math.min(Math.max(0, -cr.left), max_horizontal);
			var off_y = Math.min(Math.max(0, -cr.top), max_vertical);

			top_headers[0].style.transform = "translate(" + off_x + "px," + off_y + "px)";

			for (var i = 1; i < side_headers.length; i++) {
				side_headers[i].style.transform = "translateX(" + off_x + "px)";
			}

			for (var i = 1; i < top_headers.length; i++) {
				top_headers[i].style.transform = "translateY(" + off_y + "px)";
			}

		});
	});

});