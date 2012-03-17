					
								var timeData=new Array();
								var contentData=new Array();
								var frameWidth = 100;
								var frameHeight = 75;
								var frameRows = 4;
								var frameColumns = 9;
								var frameGrid = frameRows * frameColumns;
								var frameCount = 0;
								var intervalId;
								var videoStarted = false;
								var content="Begning";
								var begning=true;
								var previousFrame=0;
								function startVideo() {
									if (videoStarted)
									  return;
									videoStarted = true;
									var timeline = document.getElementById("timeline");
									timeline.onclick = function(evt) {                                                                                
										var offX = evt.layerX - timeline.offsetLeft;
										var offY = evt.layerY - timeline.offsetTop;
										//offX-=412;
										//offY-=4;
										var clickedFrame = Math.floor(offY / frameHeight) * frameColumns;
										clickedFrame += Math.floor(offX / frameWidth);					
										if(clickedFrame<frameCount){
											if(!begning){
												updateRTE("rte1");
												contentData[previousFrame]=document.myform.rte1.value;
											}
											begning=false;
											var video = document.getElementById("movies");
											video.currentTime = timeData[clickedFrame];											
											var oRTE = document.getElementById("rte1").contentWindow.document;
											oRTE.open();
											oRTE.write(contentData[clickedFrame]);
											oRTE.close();
											updateRTE("rte1");
											contentData[clickedFrame]=document.myform.rte1.value;
											previousFrame=clickedFrame;
										}
										else{
											alert("Please click on a frame");
										}
									}
								}
								function updateFrame() {
									if(frameCount>frameGrid-1){
										alert("Maximum "+frameGrid+" samples allowed");
									}
									else{
                                                                                document.getElementById("sampled").value="true";
										var video = document.getElementById("movies");
										var timeline = document.getElementById("timeline");
										var ctx = timeline.getContext("2d");
                                                                                ctx.fillStyle='#FF0000';
										var framePosition=frameCount%frameGrid;
										var frameX=(framePosition%frameColumns)*frameWidth;
										var frameY =(Math.floor(framePosition/frameColumns))*frameHeight;
										ctx.drawImage(video, 0, 0, 300, 200, frameX, frameY, frameWidth, frameHeight);
										timeData[frameCount]=Math.floor(video.currentTime);
										contentData[frameCount]="Sample "+frameCount+"<br>content here";
										frameCount++;
									}									
								}
								var submitJArray = function() {	
									var i;
									for(i=1;i<contentData.length;i++){
										contentData[i]="elw"+contentData[i];
									}
									document.getElementById("slidedata").value = contentData;
									document.getElementById("times").value = timeData;
								};								