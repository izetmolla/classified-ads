<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ ?>
                <div class="navbar-collapse collapse">
    				<ul class="nav navbar-nav ml-auto navbar-right">
    					<li class="nav-item"><a href="/login/" class="nav-link"><i class="icon-th-thumb"></i> Login</a></li>
    					<li class="nav-item"><a href="/register/" class="nav-link"><i class="icon-th-thumb"></i> Register</a></li>
    					
    					<li class="postadd nav-item"><a class="btn btn-block   btn-border btn-post btn-danger nav-link" href="/post-ads/">Post Free Add</a>
    					</li>

    				</ul>
    			</div>
    			<!--/.nav-collapse -->
<?php }else{ ?>
                <div class="navbar-collapse collapse">
    				<ul class="nav navbar-nav ml-auto navbar-right">
    					<li class="nav-item"><a href="/" class="nav-link"><i class="icon-home"></i>Home</a>
    					</li>
    					<li class="dropdown no-arrow nav-item"><a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

    						<span><?php echo $usersession['fullname']; ?></span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa"></i></a>
    						<ul
    								class="dropdown-menu user-menu dropdown-menu-right">
    							<li class="active dropdown-item"><a href="/account/"><i class="icon-home"></i> Personal Home

    							</a>
    							</li>
    							<li class="dropdown-item"><a href="/my-ads/"><i class="icon-th-thumb"></i> My ads </a>
    							</li>
    							
    							<li class="dropdown-item"><a href="/my-pending-ads/"><i class="icon-hourglass"></i> Pending

    								approval </a>
    							</li>
    							<li class="dropdown-item"><a href="/logout/"><i class=" icon-logout "></i> Log out </a>
    							</li>
    						</ul>
    					</li>
                    <?php if($usersession['type'] == 'admin'){
                        echo '<li class="postadd nav-item"><a class="btn btn-block   btn-border btn-post btn-danger nav-link" href="/administrator/">Administrator Panel</a></li>';
                    }else{
                        echo '<li class="postadd nav-item"><a class="btn btn-block   btn-border btn-post btn-danger nav-link" href="/post-ads/">Post Free Add</a></li>';
                    } ?>
    					

    				</ul>
    			</div>
    			<!--/.nav-collapse -->
<?php } ?>

