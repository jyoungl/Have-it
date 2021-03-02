<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

			<!-- Topbar Search -->
			<form name="fsearchbox" class="form-inline mr-auto w-100 navbar-search" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
				<div class="input-group">
					<input type="hidden" name="sfl" value="wr_subject||wr_content">
					<input type="hidden" name="sop" value="and">
					<input type="text" name="stx" class="form-control bg-light border-0 small" id="sch_stx" maxlength="20" placeholder="검색어를 입력해주세요" aria-label="Search" aria-describedby="basic-addon2">

					<div class="input-group-append">
						<button type="submit" id="sch_submit" value="검색" class="btn btn-primary"><i class="fas fa-search fa-sm"></i></button>
					</div>
					<!--- ./input-group-append --->
				</div>
				<!--- ./input-group --->
				
				<?php echo popular('theme/basic'); // 인기검색어, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정  ?>
			</form>
			
				

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">            
			
			<?php if ($member['mb_id']) { ?>
            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"><?php if ($memo_count['_cnt']) { echo number_format($memo_count['_cnt']); } ?></span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
				<?php for ($i=0; $memo_list = sql_fetch_array($memo_list_result); $i++) { ?>
				
                <a class="dropdown-item d-flex align-items-center" href="<?php echo G5_BBS_URL; ?>/memo_view.php?me_id=<?php echo $memo_list['me_id']; ?>&kind=recv">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="<?php echo G5_IMG_URL; ?>/no_profile.gif" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?php echo cut_str(get_text($memo_list['me_memo']), 15); ?></div>
                    <div class="small text-gray-500"><?php echo $memo_list['me_send_mb_id']; ?></div>
                  </div>
                </a>
				<?php } ?>
				<?php if ($i == 0) { ?>
				<a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    &nbsp;
                    
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">수신된 메시지가 없습니다.</div>
                    <div class="small text-gray-500">&nbsp;</div>
                  </div>
                </a>
				<?php } ?>
				
                <a class="dropdown-item text-center small text-gray-500" href="<?php echo G5_BBS_URL; ?>/memo.php">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
			
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $member['mb_nick']; ?></span>
                <img class="img-profile rounded-circle" src="<?php echo G5_IMG_URL; ?>/no_profile.gif">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if ($is_admin) { ?>
				<a class="dropdown-item" href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
				<?php } else {
					echo outlogin('theme/basic');
				} ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
			<?php } else {
				echo outlogin('theme/basic');
			} ?>

          </ul>

        </nav>
        <!-- End of Topbar -->