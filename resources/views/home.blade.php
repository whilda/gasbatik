@extends('layouts.dashboard')

@section('title')
    Gas Batik - Dashboard
@endsection

@section('dash')
    active
@endsection

@section('misc')
    active
@endsection

@section('item_sub')
    collapse
@endsection

@section('trans_sub')
    collapse
@endsection

@section('css')
    <link href="../resources/assets/css/plugins/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../resources/assets/js/plugins/datatables/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet">
@endsection
@section('content')
    <h1 class="page-title">Dashboard</h1>
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel minimal panel-default">
                        <div class="panel-heading clearfix"> 
                            <div class="panel-title">Asset</div> 
                            <ul class="panel-tool-options"> 
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="icon-cog"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#"><i class="icon-arrows-ccw"></i> Update data</a></li>
                                        <li><a href="#"><i class="icon-list"></i> Detailed log</a></li>
                                        <li><a href="#"><i class="icon-chart-pie"></i> Statistics</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class="icon-cancel"></i> Clear list</a></li>
                                    </ul>
                                 </li>
                            </ul> 
                        </div> 
                        <!-- panel body --> 
                        <div class="panel-body">
                            <div class="stack-order">
                                <h1 class="no-margins">Rp {{ number_format($asset, 0, ',', '.') }}</h1>
                                <small>Raised from {{ number_format($quantity, 0, ',', '.') }} items.</small>
                            </div>
                            <div class="bar-chart-icon"></div>
                        </div> 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel minimal panel-default">
                        <div class="panel-heading no-border clearfix"> 
                            <ul class="panel-tool-options"> 
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="icon-cog"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#"><i class="icon-arrows-ccw"></i> Update data</a></li>
                                        <li><a href="#"><i class="icon-list"></i> Detailed log</a></li>
                                        <li><a href="#"><i class="icon-chart-pie"></i> Statistics</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class="icon-cancel"></i> Clear list</a></li>
                                    </ul>
                                 </li>
                            </ul>  
                        </div> 
                        <!-- panel body --> 
                        <div class="panel-body panel-content"> 
                            <div class="stack-order text-center">
                                <h1>{{ number_format($sold, 0, ',', '.') }}</h1>
                                <h4>Products sold so far</h4>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel minimal panel-default">
                        <div class="panel-heading clearfix"> 
                            <div class="panel-title">Last Month Revenue</div> 
                            <ul class="panel-tool-options"> 
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="icon-cog"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#"><i class="icon-arrows-ccw"></i> Update data</a></li>
                                        <li><a href="#"><i class="icon-list"></i> Detailed log</a></li>
                                        <li><a href="#"><i class="icon-chart-pie"></i> Statistics</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class="icon-cancel"></i> Clear list</a></li>
                                    </ul>
                                 </li>
                            </ul>  
                        </div> 
                        <!-- panel body --> 
                        <div class="panel-body">
                            <div class="row col-with-divider">
                                <div class="col-xs-6 text-center stack-order"> 
                                    <small>Gross Revenue</small>
                                </div>
                                <div class="col-xs-6 text-center stack-order"> 
                                    <small>Net Revenue</small>
                                </div>
                            </div>
                            <div class="row col-with-divider">
                                <div class="col-xs-6 text-center stack-order"> 
                                    <h1 class="no-margins">{{ number_format($prev_gross, 0, ',', '.') }}</h1>
                                </div>
                                <div class="col-xs-6 text-center stack-order"> 
                                    <h1 class="no-margins">{{ number_format($prev_net, 0, ',', '.') }}</h1>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading no-border clearfix"> 
                            <h3 class="panel-title">VISIT STATS</h3>
                            <ul class="panel-tool-options"> 
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="icon-cog icon-2x"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#"><i class="icon-arrows-ccw"></i> Update data</a></li>
                                        <li><a href="#"><i class="icon-list"></i> Detailed log</a></li>
                                        <li><a href="#"><i class="icon-chart-pie"></i> Statistics</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class="icon-cancel"></i> Clear list</a></li>
                                    </ul>
                                 </li>
                            </ul> 
                        </div> 
                        <!-- panel body --> 
                        <div class="panel-body"> 
                            <div class="canvas-chart has-doughnut-legend">
                                <canvas id="doughnutChart" width="408" height="300"></canvas>
                            </div>
                            <div class="height-13"></div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel-group">
                <div class="panel panel-invert">
                    <div class="panel-heading no-border clearfix"> 
                        <h2 class="panel-title">Revenue</h2>
                        <ul class="panel-tool-options"> 
                            <li><a href="#" id="Revenuelines"><i class="icon-chart-line icon-2x"></i></a></li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="icon-cog icon-2x"></i></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-arrows-ccw"></i> Update data</a></li>
                                    <li><a href="#"><i class="icon-list"></i> Detailed log</a></li>
                                    <li><a href="#"><i class="icon-chart-pie"></i> Statistics</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon-cancel"></i> Clear list</a></li>
                                </ul>
                             </li>
                        </ul> 
                    </div>
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div id="Revenue-lines" class="flot-chart-content"></div>
                        </div>
                        <div id="placeholder_overview" style="width:100%; height:60px;"></div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <div class="panel-update-content">
                            <div class="row-revenue clearfix">
                                <div class="col-xs-6">
                                    <h5>Gross Revenue</h5>
                                    <h1>{{ number_format($now_gross, 0, ',', '.') }}</h1>
                                </div>
                                <div class="col-xs-6">
                                    <h5>Net Revenue</h5>
                                    <h1>{{ number_format($now_net, 0, ',', '.') }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default no-border">
                <div class="panel-heading no-border clearfix"> 
                    <h2 class="panel-title">Latest Activities</h2>
                    <ul class="panel-tool-options"> 
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="icon-cog icon-2x"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-arrows-ccw"></i> Update data</a></li>
                                <li><a href="#"><i class="icon-list"></i> Detailed log</a></li>
                                <li><a href="#"><i class="icon-chart-pie"></i> Statistics</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="icon-cancel"></i> Clear list</a></li>
                            </ul>
                         </li>
                    </ul>
                </div>   
                <div class="panel-body">
                    <ul class="list-item">
                        <li>
                            <div class="feed-element">
                                <div class="feed-head"><a href="#/">Jassica</a> commented on <a href="#/">4 keys to make your business unique</a></div>
                                <div class="feed-content">
                                    <p>Thank you for posting such a wonderful content. The writing was outstanding. Subscribed to latest from you as well :)</p>
                                </div>  
                            </div>
                        </li>
                        <li>
                            <div class="feed-element">
                                <div class="feed-head"><a href="#/">Jassica</a> commented on <a href="#/">4 keys to make your business unique</a></div>
                                <div class="feed-content">
                                    <p>Thank you for posting such a wonderful content. The writing was outstanding. Subscribed to latest from you as well :)</p>
                                </div>  
                            </div>
                        </li>
                        <li>
                            <div class="feed-element">
                                <div class="feed-head"><a href="#/">Morrise</a> added 3 new photos to the gallery <a href="#/">Australia Trip</a></div>
                                <div class="feed-content">
                                    <div class="media-inline">
                                        <img src="../resources/image/media-1.jpg" alt="Media" title="Media">
                                        <img src="../resources/image/media-2.jpg" alt="Media" title="Media">
                                        <img src="../resources/image/media-3.jpg" alt="Media" title="Media">
                                    </div>
                                </div>  
                            </div>
                        </li>
                        <li>
                            <div class="feed-element">
                                <div class="feed-head"><a href="#/">Stella Johnson</a> is now connected with <a href="#/">Tom Brown</a></div>
                                <div class="feed-content">
                                    <div class="connected-users">
                                        <img class="pull-left img-circle avatar" src="../resources/image/stella-johnson.png" alt="">
                                        <i class="pull-left icon-shareable icon-2x"></i>
                                        <img class="pull-left img-circle avatar" src="../resources/image/man-3.jpg" alt="">
                                    </div>
                                </div>  
                            </div>
                        </li>
                        <li>
                            <div class="feed-element">
                                <div class="feed-head"><a href="#/">Domnic</a> is feeling <a href="#/">blessed</a></div>
                                <div class="feed-content">
                                    <p>Today I’m blessed with a baby girl. Its not easy to express the feelings :)</p>
                                </div>  
                            </div>
                        </li>
                    </ul>
                </div>
                <button class="btn btn-primary btn-block btn-2x">SHOW MORE</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading no-border clearfix"> 
                    <h2 class="panel-title">Asset history</h2>
                    <ul class="panel-tool-options"> 
                        <li><a href="#" id="lines"><i class="icon-chart-line icon-2x"></i></a></li>
                        <li><a href="#" id="bars"><i class="icon-chart-bar icon-2x"></i></a></li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="icon-cog icon-2x"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-arrows-ccw"></i> Update data</a></li>
                                <li><a href="#"><i class="icon-list"></i> Detailed log</a></li>
                                <li><a href="#"><i class="icon-chart-pie"></i> Statistics</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="icon-cancel"></i> Clear list</a></li>
                            </ul>
                         </li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="flot-chart float-chart-lg">
                        <div id="graph-lines" class="flot-chart-content"></div>
                        <div id="graph-bars" class="flot-chart-content"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading no-border clearfix"> 
                    <h2 class="panel-title">Low Stock Items</h2>
                    <ul class="panel-tool-options"> 
                        <li><a href="#" id="lines"><i class="icon-chart-line icon-2x"></i></a></li>
                        <li><a href="#" id="bars"><i class="icon-chart-bar icon-2x"></i></a></li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="icon-cog icon-2x"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-arrows-ccw"></i> Update data</a></li>
                                <li><a href="#"><i class="icon-list"></i> Detailed log</a></li>
                                <li><a href="#"><i class="icon-chart-pie"></i> Statistics</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="icon-cancel"></i> Clear list</a></li>
                            </ul>
                         </li>
                    </ul>
                </div>
                <div class="panel-body">
                   <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Vendor</th>
                                    <th>Type</th>
                                    <th>Material</th>
                                    <th>Note</th>
                                    <th>Purchase</th>
                                    <th>Sell</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($items->count())
                                @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->vendor->name }}</td>
                                    <td>{{ $item->type->name }}</td>
                                    <td>{{ $item->material->name }}</td>
                                    <td>{{ $item->note }}</td>
                                    <td>{{ $item->purchase_price }}</td>
                                    <td>{{ $item->sell_price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Code</th>
                                    <th>Vendor</th>
                                    <th>Type</th>
                                    <th>Material</th>
                                    <th>Note</th>
                                    <th>Purchase</th>
                                    <th>Sell</th>
                                    <th>Quantity</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="../resources/assets/js/plugins/flot/jquery.flot.min.js"></script>
    <script src="../resources/assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../resources/assets/js/plugins/flot/jquery.flot.resize.min.js"></script>
    <script src="../resources/assets/js/plugins/flot/jquery.flot.selection.min.js"></script>
    <script src="../resources/assets/js/plugins/flot/jquery.flot.pie.min.js"></script>
    <script src="../resources/assets/js/plugins/flot/jquery.flot.time.min.js"></script>

    <script src="../resources/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../resources/assets/js/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../resources/assets/js/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
    <script src="../resources/assets/js/plugins/datatables/jszip.min.js"></script>
    <script src="../resources/assets/js/plugins/datatables/pdfmake.min.js"></script>
    <script src="../resources/assets/js/plugins/datatables/vfs_fonts.js"></script>
    <script src="../resources/assets/js/plugins/datatables/extensions/Buttons/js/buttons.html5.js"></script>
    <script src="../resources/assets/js/plugins/datatables/extensions/Buttons/js/buttons.colVis.js"></script>

    <script src="../resources/assets/js/app/home.js"></script>
@endsection