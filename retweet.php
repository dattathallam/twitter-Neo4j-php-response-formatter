<button type="button" class="tweet btn btn-success navbar-right  btn-info" data-toggle="modal" id="rt" data-target="#retweetmodal" style=" background-color: green;  margin: 10px;margin-left: -6;margin-top: 8px;">
		            	<a style="color: white;text-decoration: none;">Retweet</a> 
		            </button>
		            <!-- Modal -->
		            <div class="modal fade" id="retweetmodal" role="dialog">
		                <div class="modal-dialog modal-lg" style="width: 650px; margin-top: 100px;">
		                    <div class="modal-content">
		                        <div class="modal-header">
		                            <button type="button" class="close" data-dismiss="modal">&times;</button>
		                            <h4 class="modal-title" style="text-align: center">Retweet</h4>
		                        </div>
		                        <form action=<?php echo htmlspecialchars($_SERVER[ "PHP_SELF"]); ?> method="post">
		                            <div class="modal-body form-control" style="height:150px;">
		                                <textarea type="text" class="form-control" name="Retweettext" rows="5" style="border-radius: 10px;" placeholder="What's Happening?"></textarea>
										<input type="number" name="parentid" value=" <?php echo $id ;?>">
									</div>
		                            <div class="modal-footer">
		                                <input type="submit" class="btn btn-success btn-info" value="retweet" name="retweet">
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div>