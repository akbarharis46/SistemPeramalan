<div id="layoutSidenav_content" style="margin-top: -10px;">
<main style="margin-left:250px;">
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10" style="background-color:blue;">
      <div class="container-xl px-4">
        <div class="page-header-content pt-4">
          <div class="row align-items-center justify-content-between">
            <div class="col-auto mt-4">
              <h1 class="page-header-title" style="color:white;">
                <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                  </svg></div>
                Selamat Datang Staff Gudang
              </h1>
              <div class="page-header-subtitle" style="color:white;">Sistem Informasi Terintegrasi PT.Milagros</div><br>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
      <div class="row">
        <div class="col-xl-4 mb-4">
          <!-- Dashboard example card 1-->
          <a class="card lift h-100" href="<?php echo base_url(); ?>KategoriClient/indexgudang">
            <div class="card-body d-flex justify-content-center flex-column">
              <div class="d-flex align-items-center justify-content-between">
                <div class="me-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package feather-xl text-primary mb-3">
                    <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                  </svg>
                  <h5>Data Kategori Barang</h5>
                  <!-- <div class="text-muted small">To create informative visual elements on your pages</div> -->
                </div>
                <img src="<?php echo base_url(); ?>img/user1.png" alt="..." style="width: 8rem">
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-4 mb-4">
          <!-- Dashboard example card 1-->
          <a class="card lift h-100" href="<?php echo base_url(); ?>BarangClient/indexgudang">
            <div class="card-body d-flex justify-content-center flex-column">
              <div class="d-flex align-items-center justify-content-between">
                <div class="me-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package feather-xl text-primary mb-3">
                    <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                  </svg>
                  <h5>Data Barang Masuk</h5>
                  <!-- <div class="text-muted small">To create informative visual elements on your pages</div> -->
                </div>
                <img src="<?php echo base_url(); ?>img/gudang.png" alt="..." style="width: 8rem">
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-4 mb-4">
          <!-- Dashboard example card 2-->
          <a class="card lift h-100" href="<?php echo base_url(); ?>StockBarangClient/indexgudang">
            <div class="card-body d-flex justify-content-center flex-column">
              <div class="d-flex align-items-center justify-content-between">
                <div class="me-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book feather-xl text-secondary mb-3">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                  </svg>
                  <h5>Data Stock Barang</h5>
                  <div class="text-muted small">To keep you on track when working with our toolkit</div>
                </div>
                <img src="<?php echo base_url(); ?>img/gudang.png" alt="..." style="width: 8rem">
              </div>
            </div>
          </a>
        </div>


        <div class="row">
          <div class="col-xxl-8">
            <!-- Tabbed dashboard card example-->
            <div class="card mb-4">
              <div class="card-header border-bottom">
                <!-- Dashboard card navigation-->
                <ul class="nav nav-tabs card-header-tabs" id="dashboardNav" role="tablist">
                  <li class="nav-item me-1"><a class="nav-link active" id="overview-pill" href="#overview" data-bs-toggle="tab" role="tab" aria-controls="overview" aria-selected="true">Overview</a></li>
                  <li class="nav-item"><a class="nav-link" id="activities-pill" href="#activities" data-bs-toggle="tab" role="tab" aria-controls="activities" aria-selected="false">Activities</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="dashboardNavContent">
                  <!-- Dashboard Tab Pane 1-->
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-pill">
                    <div class="chart-area mb-4 mb-lg-0" style="height: 20rem">
                      <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                          <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                          <div class=""></div>
                        </div>
                      </div><canvas id="myAreaChart" width="1748" height="640" style="display: block; height: 320px; width: 874px;" class="chartjs-render-monitor"></canvas>
                    </div>
                  </div>
                  <!-- Dashboard Tab Pane 2-->
                  <div class="tab-pane fade" id="activities" role="tabpanel" aria-labelledby="activities-pill">
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                      <div class="dataTable-top">
                        <div class="dataTable-dropdown"><label><select class="dataTable-selector">
                              <option value="5">5</option>
                              <option value="10" selected="">10</option>
                              <option value="15">15</option>
                              <option value="20">20</option>
                              <option value="25">25</option>
                            </select> entries per page</label></div>
                        <div class="dataTable-search"><input class="dataTable-input" placeholder="Search..." type="text"></div>
                      </div>
                      <div class="dataTable-container">
                        <table id="datatablesSimple" class="dataTable-table">
                          <thead>
                            <tr>
                              <th data-sortable=""><a href="#" class="dataTable-sorter">Date</a></th>
                              <th data-sortable=""><a href="#" class="dataTable-sorter">Event</a></th>
                              <th data-sortable=""><a href="#" class="dataTable-sorter">Time</a></th>
                            </tr>
                          </thead>

                          <tbody>
                            <tr>
                              <td>01/13/20</td>
                              <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap me-2 text-green">
                                  <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                                </svg>
                                Server online
                              </td>
                              <td>1:21 AM</td>
                            </tr>
                            <tr>
                              <td>01/13/20</td>
                              <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap-off me-2 text-red">
                                  <polyline points="12.41 6.75 13 2 10.57 4.92"></polyline>
                                  <polyline points="18.57 12.91 21 10 15.66 10"></polyline>
                                  <polyline points="8 8 3 14 12 14 11 22 16 16"></polyline>
                                  <line x1="1" y1="1" x2="23" y2="23"></line>
                                </svg>
                                Server restarted
                              </td>
                              <td>1:00 AM</td>
                            </tr>
                            <tr>
                              <td>01/12/20</td>
                              <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart me-2 text-purple">
                                  <circle cx="9" cy="21" r="1"></circle>
                                  <circle cx="20" cy="21" r="1"></circle>
                                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                New order placed! Order #
                                <a href="<?php echo base_url(); ?>AdminClient">1126550</a>
                              </td>
                              <td>5:45 AM</td>
                            </tr>
                            <tr>
                              <td>01/12/20</td>
                              <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user me-2 text-blue">
                                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                Valerie Luna submitted
                                <a href="<?php echo base_url(); ?>AdminClient">quarter four report</a>
                              </td>
                              <td>4:23 PM</td>
                            </tr>
                            <tr>
                              <td>01/12/20</td>
                              <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database me-2 text-yellow">
                                  <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                  <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                  <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                </svg>
                                Database backup created
                              </td>
                              <td>3:51 AM</td>
                            </tr>
                            <tr>
                              <td>01/12/20</td>
                              <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart me-2 text-purple">
                                  <circle cx="9" cy="21" r="1"></circle>
                                  <circle cx="20" cy="21" r="1"></circle>
                                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                New order placed! Order #
                                <a href="<?php echo base_url(); ?>AdminClient">1126549</a>
                              </td>
                              <td>1:22 AM</td>
                            </tr>
                            <tr>
                              <td>01/11/20</td>
                              <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus me-2 text-blue">
                                  <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="8.5" cy="7" r="4"></circle>
                                  <line x1="20" y1="8" x2="20" y2="14"></line>
                                  <line x1="23" y1="11" x2="17" y2="11"></line>
                                </svg>
                                New user created:
                                <a href="<?php echo base_url(); ?>AdminClient">Sam Malone</a>
                              </td>
                              <td>4:18 PM</td>
                            </tr>
                            <tr>
                              <td>01/11/20</td>
                              <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart me-2 text-purple">
                                  <circle cx="9" cy="21" r="1"></circle>
                                  <circle cx="20" cy="21" r="1"></circle>
                                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                New order placed! Order #
                                <a href="<?php echo base_url(); ?>AdminClient">1126548</a>
                              </td>
                              <td>4:02 PM</td>
                            </tr>
                            <tr>
                              <td>01/11/20</td>
                              <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart me-2 text-purple">
                                  <circle cx="9" cy="21" r="1"></circle>
                                  <circle cx="20" cy="21" r="1"></circle>
                                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                New order placed! Order #
                                <a href="<?php echo base_url(); ?>AdminClient">1126547</a>
                              </td>
                              <td>3:47 PM</td>
                            </tr>
                            <tr>
                              <td>01/11/20</td>
                              <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap me-2 text-green">
                                  <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                                </svg>
                                Server online
                              </td>
                              <td>1:19 AM</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="dataTable-bottom">
                        <div class="dataTable-info">Showing 1 to 10 of 14 entries</div>
                        <nav class="dataTable-pagination">
                          <ul class="dataTable-pagination-list">
                            <li class="pager"><a href="#" data-page="1">‹</a></li>
                            <li class="active"><a href="#" data-page="1">1</a></li>
                            <li class=""><a href="#" data-page="2">2</a></li>
                            <li class="pager"><a href="#" data-page="2">›</a></li>
                          </ul>
                        </nav>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Illustration dashboard card example-->
            <div class="card mb-4">
              <div class="card-body py-5">
                <div class="d-flex flex-column justify-content-center">
                  <img class="img-fluid mb-4" src="assets/img/illustrations/data-report.svg" alt="" style="height: 10rem">
                  <div class="text-center px-0 px-lg-5">
                    <h5>New reports are here! Generate custom reports now!</h5>
                    <p class="mb-4">Our new report generation system is now online. You can start creating custom reporting for any documents available on your account.</p>
                    <a class="btn btn-primary p-3" href="<?php echo base_url(); ?>AdminClient">Get Started</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">


            </div>



            </footer>
          </div>