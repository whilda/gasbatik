	$(document).ready(function () {
		/* Low Stock Data*/
		$('#dataTables').DataTable({
			dom: '<"html5buttons" B>lTfgitp',
			buttons: [
				{
					extend: 'copyHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'excelHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [ 0, 1 ]
					}
				},
				'colvis'
			],
			initComplete: function () {
	            this.api().columns().every( function () {
	                var column = this;
	                var select = $('<select><option value=""></option></select>')
	                    .appendTo( $(column.footer()).empty() )
	                    .on( 'change', function () {
	                        var val = $.fn.dataTable.util.escapeRegex(
	                            $(this).val()
	                        );
	 
	                        column
	                            .search( val ? '^'+val+'$' : '', true, false )
	                            .draw();
	                    } );
	 
	                column.data().unique().sort().each( function ( d, j ) {
	                    select.append( '<option value="'+d+'">'+d+'</option>' )
	                } );
	            } );
	        }
		});

		var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
		/* Line Bar Graph*/
		$.getJSON( "./api/asset_history", function( AssetData ) {
			// charts
			var previousPoint = null;
			$('#graph-bars, #graph-lines').bind('plothover', function (event, pos, item) {
				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;
						$('#flotTip').remove();
						var x = item.datapoint[0],
								y = item.datapoint[1];

						var color = item.series.color;
						var day = new Date(x).getDate();
						var month = monthNames[new Date(x).getMonth()];
						var year = new Date(x).getFullYear();
						showTooltip(item.pageX,
								item.pageY,
								day + ' ' + month + ',' + year
								+ " : <strong>Rp " + y +
								"</strong>");

						/*content = item.series.label + ' = ' + item.datapoint[1];
						 showTooltip(item.pageX, item.pageY, content);
						 showTooltip(item.pageX, item.pageY, y + ' visitors at ' + x + '.00h');*/

					}
				} else {
					$('#flotTip').remove();
					previousPoint = null;
				}
			});

			var graphData = [{
					// asset
					data: AssetData,
					color: '#77b7c5'
				}
			];


			// Lines
			$.plot($('#graph-lines'), graphData, {
				series: {
					points: {
						show: true,
						radius: 3.5
					},
					lines: {
						show: true,
						fill: true
					},
					shadowSize: 0
				},
				grid: {
					color: '#646464',
					borderColor: 'transparent',
					borderWidth: 20,
					hoverable: true
				},
				xaxis: {
					mode: "time",
					tickColor: 'transparent',
					tickDecimals: 2
				}
			});

			// Bars
			$.plot($('#graph-bars'), graphData, {
				series: {
					points: {
						show: true,
						radius: 3.5,
					},
					lines: {
						show: true,
						fill: false
					},
					bars: {
						show: false,
						lineWidth: 5,
						align: 'center'
					},
					shadowSize: 0,
					hoverable: true
				},
				grid: {
					color: '#646464',
					borderColor: 'transparent',
					borderWidth: 20,
					hoverable: true
				},
				xaxis: {
					mode: "time",
					tickColor: 'transparent',
					tickDecimals: 2
				}
			});

			var $graphBar = $('#graph-bars'), $graphLine = $('#graph-lines'), $linkLine = $('#lines'), $linkBar = $('#bars');
			$graphBar.hide();
			$linkLine.on('click', function (e) {
				e.preventDefault();

				$linkBar.removeClass('active');
				$graphBar.fadeOut(function () {
					$(this).addClass('active');
					$graphLine.fadeIn();
				});
			});
			$linkBar.on('click', function (e) {
				e.preventDefault();

				$linkLine.removeClass('active');
				$graphLine.fadeOut(function () {
					$(this).addClass('active');
					$graphBar.fadeIn();
				});
			});
		});

		/* Revenue */
		$.getJSON( "./api/revenue", function( revenueData ) {
			var revenueData = [{
					// Visits
					data: revenueData,
					//data: [[1167692400000, 400.05], [1167778800000, 1600.32], [1167865200000, 900.35], [1167951600000, 2100.31], [1168210800000, 1800.55], [1169766000000, 900.42], [1170025200000, 2285.01], [1170111600000, 1870.97], [1170198000000, 2145.14], [1170284400000, 1530.14], [1170370800000, 1490.02], [1170630000000, 1340.74], [1170716400000, 1280.88], [1170802800000, 1157.71], [1170889200000, 599.71], [1170975600000, 2159.89], [1171234800000, 1557.81], [1171321200000, 959.06], [1171407600000, 58.00], [1171494000000, 757.99]],
					color: '#fff',
					label: 'Revenue(Rp)',
					dashes: {show: true}
				}
			];

			$('#placeholder_overview, #Revenue-lines').bind('plothover', function (event, pos, item) {
				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;
						$('#flotTip').remove();
						var x = item.datapoint[0],
								y = item.datapoint[1];
						//showTooltip(item.pageX, item.pageY, y + ' visitors at ' + x + '.00h');

						var color = item.series.color;
						var day = new Date(x).getDate();
						var month = monthNames[new Date(x).getMonth()];
						var year = new Date(x).getFullYear();
						showTooltip(item.pageX,
								item.pageY,
								day + ' ' + month + ',' + year
								+ " : <strong>" + y +
								"(Rp)</strong>");
					}
				} else {
					$('#flotTip').remove();
					previousPoint = null;
				}
			});

			var options = {
				series: {
					points: {
						show: true,
						radius: 3.5,
						fillColor: "rgba(0,0,0,0.35)",
					},
					lines: {
						show: true,
						lineWidth: 2,
						fill: true
					},
					bars: {
						show: false,
						lineWidth: 2
					},
					shadowSize: 10,
					highlightColor: '#fff',
					hoverable: true,
					clickable: true,
				},
				grid: {
					color: '#646464',
					borderColor: 'transparent',
					borderWidth: 20,
					hoverable: true,
					tickColor: "rgba(255,255,255,0.05)",
					markingsColor: "rgba(255,255,255,0.05)",
					markingsLineWidth: 5,
					/*backgroundColor: {
						colors: ["rgba(54,58,60,0.05)", "rgba(0,0,0,0.2)"]
					}*/
				},
				legend: {
					show: true
				},
				xaxis: {
					mode: 'time',
					font: {
						weight: "bold"
					},
					color: "#D6D8DB",
					tickColor: 'transparent',
					tickDecimals: 2
				},
				selection: {
					mode: "x"
				},
				/*yaxis: {
					font: {
						weight: "bold"
					},
					color: "#D6D8DB",
					tickSize: 500
				}*/
			};

			// Lines
			var plot = $.plot($('#Revenue-lines'), revenueData, options);

			// Bars
			var overview = $.plot($("#placeholder_overview"), revenueData, {
				colors: ["#edc240", "#5eb95e"],
				series: {
					bars: {
						show: true,
						lineWidth: 5,
						fillColor: "#5eb95e"
					},
					shadowSize: 2,
					grow: {
						active: false
					}
				},
				legend: {
					show: false
				},
				xaxis: {
					ticks: [],
					mode: "time"
				},
				yaxis: {
					ticks: [],
					min: 0,
					autoscaleMargin: 0.1
				},
				selection: {
					mode: "x"
				},
				grid: {
					color: "#D6D8DB",
					borderColor: 'transparent',
					markingsColor: "rgba(255,255,255,0.05)",
					/*backgroundColor: {
						colors: ["rgba(54,58,60,0.05)", "rgba(0,0,0,0.2)"]
					}*/
				}
			});

			$("#Revenue-lines").bind("plotselected", function (event, ranges) {
				// do the zooming
				plot = $.plot($("#Revenue-lines"), revenueData,
						$.extend(true, {}, options, {
							xaxis: {
								min: ranges.xaxis.from,
								max: ranges.xaxis.to
							}
						}));

				// don't fire event on the overview to prevent eternal loop
				overview.setSelection(ranges, true);
			});

			$("#placeholder_overview").bind("plotselected", function (event, ranges) {
				plot.setSelection(ranges);
			});

			$("#Revenuelines").click(function (event) {
				event.preventDefault();
				overview.clearSelection();
				$.plot($("#Revenue-lines"), revenueData, options);
			});
		});
		// pie graph
		var doughnutData = [
			{
				value: 5742,
				color: "#2bbfba",
				highlight: "#1fb3ae",
				label: "Only Visited"
			},
			{
				value: 2496,
				color: "#00b8ce",
				highlight: "#00acc2",
				label: "Purchased"
			},
			{
				value: 1762,
				color: "#e5e8eb",
				highlight: "#d9dcdf",
				label: "Bounced"
			}
		];

		var doughnutOptions = {
			segmentShowStroke: true,
			segmentStrokeColor: "#fff",
			segmentStrokeWidth: 4,
			percentageInnerCutout: 60, // This is 0 for Pie charts
			animationSteps: 100,
			animationEasing: "easeOutBounce",
			animateRotate: true,
			animateScale: false,
			responsive: true,
			//String - A legend template
			legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
		};

		var canvas = document.getElementById("doughnutChart");
		var helpers = Chart.helpers;
		//var ctx = document.getElementById("doughnutChart").getContext("2d");
		var moduleDoughnut = new Chart(canvas.getContext("2d")).Doughnut(doughnutData, doughnutOptions);
		var legendHolder = document.createElement('div');
		legendHolder.innerHTML = moduleDoughnut.generateLegend();
		helpers.each(legendHolder.firstChild.childNodes, function (legendNode, index) {
			helpers.addEvent(legendNode, 'mouseover', function () {
				var activeSegment = moduleDoughnut.segments[index];
				activeSegment.save();
				activeSegment.fillColor = activeSegment.highlightColor;
				moduleDoughnut.showTooltip([activeSegment]);
				activeSegment.restore();
			});
		});
		helpers.addEvent(legendHolder.firstChild, 'mouseout', function () {
			moduleDoughnut.draw();
		});
		canvas.parentNode.parentNode.appendChild(legendHolder.firstChild);
	});