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

@section('content')
    <h1 class="page-title">Dashboard</h1>
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel minimal panel-default">
                        <div class="panel-heading clearfix"> 
                            <div class="panel-title">Signups</div> 
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
                                    <h1 class="no-margins">87</h1>
                                    <small>This week</small>
                                </div>
                                <div class="col-xs-6 text-center stack-order"> 
                                    <h1 class="no-margins">53</h1>
                                    <small>Last week</small>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel minimal panel-default">
                        <div class="panel-heading clearfix"> 
                            <div class="panel-title">Last month sale</div> 
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
                                <h1 class="no-margins">$87,003</h1>
                                <small>Raised from 89 orders.</small>
                            </div>
                            <div class="bar-chart-icon"></div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel minimal panel-default">
                        <div class="panel-heading clearfix"> 
                            <div class="panel-title">Visitors</div> 
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
                                <h1 class="no-margins">823</h1>
                                <small>New visits this month</small>
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
                                <h1>7856</h1>
                                <h4>Products sold so far</h4>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2>Recent comments from customers</h2>
                            <ul class="comments-list removeable-list">
                                <li>
                                    <div class="comment-head"><a href="#/">Jassica</a> commented on <a href="#/">4 keys to make your business unique</a></div>
                                    <div class="comment-text">
                                        <p>Thank you for posting such a wonderful content. The writing was outstanding. Subscribed to latest from you as well :)</p>
                                    </div>
                                    <div class="comment-footer">
                                        <button class="btn btn-sm btn-success">APPROVE</button>
                                        <button class="btn btn-sm btn-red">DELETE</button>
                                    </div>
                                    <a href="#/" class="remove"><img src="../resources/image/icon-close.png" alt="Remove" title="Remove"></a>
                                </li>
                                <li>
                                    <div class="comment-head"><a href="#/">Jassica</a> commented on <a href="#/">4 keys to make your business unique</a></div>
                                    <div class="comment-text">
                                        <p>Thank you for posting such a wonderful content. The writing was outstanding. Subscribed to latest from you as well :)</p>
                                    </div>
                                    <div class="comment-footer">
                                        <button class="btn btn-sm btn-success">APPROVE</button>
                                        <button class="btn btn-sm btn-red">DELETE</button>
                                    </div>
                                    <a href="#/" class="remove"><img src="../resources/image/icon-close.png" alt="Remove" title="Remove"></a>
                                </li>
                                <li>
                                    <div class="comment-head"><a href="#/">Jassica</a> commented on <a href="#/">4 keys to make your business unique</a></div>
                                    <div class="comment-text">
                                        <p>Thank you for posting such a wonderful content. The writing was outstanding. Subscribed to latest from you as well :)</p>
                                    </div>
                                    <div class="comment-footer">
                                        <button class="btn btn-sm btn-success">APPROVE</button>
                                        <button class="btn btn-sm btn-red">DELETE</button>
                                    </div>
                                    <a href="#/" class="remove"><img src="../resources/image/icon-close.png" alt="Remove" title="Remove"></a>
                                </li>
                            </ul>
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
                                    <h1>9,362.74</h1>
                                </div>
                                <div class="col-xs-6">
                                    <h5>Net Revenue</h5>
                                    <h1>6,734.89</h1>
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
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="speed-analyzer">
                        <div class="speed-analyzer-text">
                            <h4>Download Speed Analyzer</h4>
                            <p>Speed test run on different anlayzers including google and YSlow.</p>
                        </div>
                        <div class="speed-score">
                            <strong class="score">82</strong>
                            <span class="uppercase">Google Score</span>
                        </div>
                        <div class="speed-score">
                            <strong class="score">73</strong>
                            <span class="uppercase">YSlow Score</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading no-border clearfix"> 
                    <h2 class="panel-title">TO-DOs for today</h2>
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
                    <ul class="list-item todo-list"> 
                        <li> 
                            <div class="checkbox checkbox-replace checkbox-primary"> 
                                <input type="checkbox" id="task-1" /> <label for="task-1">Fresh look &amp; feel to repaint the website according to the new brand logo.</label> 
                            </div> 
                        </li> 
                        <li> 
                            <div class="checkbox checkbox-replace checkbox-primary"> 
                                <input type="checkbox" id="task-2" checked /> <label for="task-2">Need some new responsive design for the wbesite.</label> 
                            </div> 
                        </li> 
                        <li> 
                            <div class="checkbox checkbox-replace checkbox-primary"> 
                                <input type="checkbox" id="task-3" /> <label for="task-3">Fresh look &amp; feel to repaint the website according to the new brand logo. </label> 
                            </div> 
                        </li> 
                        <li> 
                            <div class="checkbox checkbox-replace checkbox-primary"> 
                                <input type="checkbox" id="task-4" /> <label for="task-4">Fresh look &amp; feel to repaint the website according to the new brand logo. </label> 
                            </div> 
                        </li> 
                        <li> 
                            <div class="checkbox checkbox-replace checkbox-primary"> 
                                <input type="checkbox" id="task-5" /> <label for="task-5">Fresh look &amp; feel to repaint the website according to the new brand logo. </label> 
                            </div> 
                        </li> 
                    </ul>
                    <div class="more">
                        <button class="btn btn-primary">Click More</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading no-border clearfix"> 
                    <h2 class="panel-title">Recent Members</h2>
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
                    <ul class="list-item member-list">
                        <li>
                            <div class="user-avatar">
                                <img title="" alt="" class="img-circle avatar" src="../resources/image/john-smith.png">
                            </div>
                            <div class="user-detail">
                                <h5>John Smith</h5>
                                <p>Joined 15 mins ago.</p>
                            </div>
                        </li>
                        <li>
                            <div class="user-avatar">
                                <img title="" alt="" class="img-circle avatar" src="../resources/image/domnic-brown.png">
                            </div>
                            <div class="user-detail">
                                <h5>Domnic Brown</h5>
                                <p>Joined 2 days ago.</p>
                            </div>
                        </li>
                        <li>
                            <div class="user-avatar">
                                <img title="" alt="" class="img-circle avatar" src="../resources/image/stella-johnson.png">
                            </div>
                            <div class="user-detail">
                                <h5>Stella Johnson</h5>
                                <p>Joined 1 day ago.</p>
                            </div>
                        </li>
                        <li>
                            <div class="user-avatar">
                                <img title="" alt="" class="img-circle avatar" src="../resources/image/alex-dolgove.png">
                            </div>
                            <div class="user-detail">
                                <h5>Alex Dolgove</h5>
                                <p>Joined 5 days ago.</p>
                            </div>
                        </li>
                    </ul>
                    <div class="more">
                        <button class="btn btn-primary">Click More</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading no-border clearfix"> 
                    <h2 class="panel-title">New Messages</h2>
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
                    <ul class="list-item message-list">
                        <li>
                            <i class="icon-mail icon-2x"></i>
                            <div class="message-body">
                                <h5>Interested in buying your pro</h5>
                                <p>Your product sounds interesting I would love to check this ne...</p>
                            </div>
                        </li>
                        <li>
                            <i class="icon-mail icon-2x"></i>
                            <div class="message-body">
                                <h5>Interested in buying your pro</h5>
                                <p>Your product sounds interesting I would love to check this ne...</p>
                            </div>
                        </li>
                        <li>
                            <i class="icon-mail icon-2x"></i>
                            <div class="message-body">
                                <h5>Interested in buying your pro</h5>
                                <p>Your product sounds interesting I would love to check this ne...</p>
                            </div>
                        </li>
                        <li>
                            <i class="icon-mail icon-2x"></i>
                            <div class="message-body">
                                <h5>Interested in buying your pro</h5>
                                <p>Your product sounds interesting I would love to check this ne...</p>
                            </div>
                        </li>
                    </ul>
                    <div class="more">
                        <button class="btn btn-primary">Click More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading no-border clearfix"> 
                    <h2 class="panel-title">Site Traffic</h2>
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
@endsection

@section('script')
    <script src="../resources/assets/js/plugins/flot/jquery.flot.min.js"></script>
    <script src="../resources/assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../resources/assets/js/plugins/flot/jquery.flot.resize.min.js"></script>
    <script src="../resources/assets/js/plugins/flot/jquery.flot.selection.min.js"></script>
    <script src="../resources/assets/js/plugins/flot/jquery.flot.pie.min.js"></script>
    <script src="../resources/assets/js/plugins/flot/jquery.flot.time.min.js"></script>
    <script src="../resources/assets/js/app/home.js"></script>
@endsection