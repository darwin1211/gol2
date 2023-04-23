@extends('frontend.layouts.app')

@section('title', app_name())

@section('content')

<div class="container-fluid container-fluid-5" style="padding: 0px !important;">
<div class="row" style="margin-left: 0px;margin-right: 0px;">
  @include('frontend.game-list.leftSide')

  <div class="col-md-10 featured-box load game-page" style="padding-right: 5px;">
                <div class="row row5">
                  <div class="col-md-9 featured-box-detail sports-wrapper m-b-10">
                    <!----> <!---->
                    <div class="header mobilebetOdds">
                        <a class="oddsMenu" href="javascript:void(0);" onclick="showoddsBets('odds');">ODDS</a>
                        <a class="matchbets" href="javascript:void(0);" onclick="showoddsBets('matchbets');">MATCHED BET</a>
                        <a class="mobileTV" href="javascript:void(0);" onclick="showTv();"> <i class="fas fa-tv v-m icon-tv"></i></a>
                    </div>
                    <div id="tv_status-errordetail" style="background: var(--theme2-bg);" class="tv-container collapse mobilebetOdds" align="center">
                      <ul class="nav nav-tabs video_nav_tab">
                          <li onclick="showTvVideo('tv1',this);" class="nav-item navli">Chanel 1</li>
                          <li onclick="showTvVideo('tv2',this);" class="nav-item navli">Chanel 2</li>
                          <li onclick="showTvVideo('tv3',this);" class="nav-item navli">Chanel 3</li>
                          <li onclick="showTvVideo('tv4',this);" class="nav-item navli">Chanel 4</li>
                      </ul>
                      <div  class="allVideo" id="tv1">
                          <iframe src="{{$adminSetting->TV_URL_1}}"
                                  class="video-iframe"></iframe>
                      </div>
                      <div style="display:none;" class="allVideo" id="tv2">
                          <iframe src="{{$adminSetting->TV_URL_2}}"
                                  class="video-iframe"></iframe>
                      </div>
                      <div style="display:none;" class="allVideo" id="tv3">
                          <iframe src="{{$adminSetting->TV_URL_3}}"
                                  class="video-iframe"></iframe>
                      </div>
                      <div style="display:none;" class="allVideo" id="tv4">
                          <iframe src="{{$adminSetting->TV_URL_4}}"
                                  class="video-iframe"></iframe>
                      </div>
                    </div>
                    <div class="game-heading">
                        <span class="card-header-title">{{$sports->match_name}}</span>
                        <span class="float-right">{{$sports->match_date_time}}</span>
                    </div>

                    <div class="markets mobileodds">

                        <!--START TOP BANER DETAILS-->
                        <!--style="display:none;"-->
                        <div class="scorecard SBMOBILE" >
                            <div class="row" style="padding:10px 15px;font-size: 14px;">
                                <div class="col-sm-6 text-left" style="padding-left:0px;">
                                    <span class="sbTeamName1"></span>
                                    <span class="sbRun1"></span>
                                </div>
                                <div class="col-sm-6 text-right" style="padding-right:0px;">
                                    <span class="sbTeamName2"></span>
                                    <span class="sbRun2"></span>
                                </div>
                            </div>
                            <div class="row" style="padding:10px 15px;font-size: 14px;">
                              <div class="col-sm-12 sbStatus text-left" style="padding-right:0px;"></div>
                            </div>
                            <div class="row" style="padding:10px 15px;font-size: 14px;">
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <span class="sbRunRate1"></span>
                                    <span class="sbRunRate2"></span>
                                </div>
                                <div class="col-sm-6 lastSixBol2 text-right" style="padding-right:0px;margin-right: 5px;font-size: 12px;">

                                </div>
                            </div>
                        </div>
                      <div class="scorecard SBDESTOP" >
                          <div class="row" style="padding:10px 15px;">
                            <div class="col-sm-2 sbTeamName1" style="padding-left:0px;"></div>
                            <div class="col-sm-2 sbRun1 text-right"></div>
                            <div class="col-sm-3 sbRunRate1 text-left"></div>
                            <div class="col-sm-5 sbStatus text-right" style="padding-right:0px;"></div>
                          </div>
                          <div class="row" style="padding:10px 15px;">
                            <div class="col-sm-2 sbTeamName2" style="padding-left:0px;"></div>
                            <div class="col-sm-2 sbRun2 text-right"></div>
                            <div class="col-sm-3 sbRunRate2 text-left"></div>
                            <div class="col-sm-5 lastSixBol2 text-right" style="padding-right:0px;">
                                <span style="color:#fff;border-radius:25%;background:gray"></span><span style="color:#fff;border-radius:25%;background:gray"></span><span style="color:#fff;border-radius:25%;background:gray"></span><span style="color:#fff;border-radius:25%;background:gray"></span><span style="color:#fff;border-radius:25%;background:gray"></span><span style="color:#fff;border-radius:25%;background:#008000"></span>
                            </div>
                          </div>
                      </div>

                      <!--END TOP BANER DETAILS-->

                      <!-- START MATCH ODDS-->
                      <input type="hidden" id="matchID" value="{{$sports->id}}">


                      <div class="main-market  rootClass desktopodds">
                        <div class="market-title mt-1">
                          MATCH_ODDS
                          <a href="javascript:void(0)" onclick="showRules('ODDS');" class="m-r-5 game-rules-icon">
                              <span><i class="fa fa-info-circle float-right"></i></span>
                          </a>
                          <span class="destopViewBetLimit float-right m-r-10">
                              @if(!empty($sports->odd_min_limit))
                                <span style="padding-right: 10px;">Min : <span>{{$sports->odd_min_limit}}</span></span>
                              @endif
                              @if(!empty($sports->odd_max_limit))
                                <span> Max : <span>{{$sports->odd_max_limit}}</span></span>
                              @endif
                          </span>
                          <!-- Hidden Value Of Max & Min Limit -->
                          <input type="hidden" class="MatchOdd" id="oddsMax" value="{{$sports->odd_max_limit}}">
                          <input type="hidden" class="MatchOdd" id="oddsMin" value="{{$sports->odd_min_limit}}">
                          <input type="hidden" class="MatchOdd" id="betType" value="ODDS">


                          <!-- End Hidden -->
                        </div>
                        <div class="table-header avoid-clicks">
                          <div class="float-left country-name mbox-4 box-4 min-max">
                            <span class="mobileViewBetLimit float-right m-r-10">
                                @if(!empty($sports->odd_min_limit))
                                  <span style="padding-right: 10px;">Min : <span>{{$sports->odd_min_limit}}</span></span>
                                @endif
                                @if(!empty($sports->odd_max_limit))
                                  <span> Max : <span>{{$sports->odd_max_limit}}</span></span>
                                @endif
                            </span>
                          </div>
                          <div class="box-1 float-left mobileOddsHide"></div>
                          <div class="box-1 float-left mobileOddsHide"></div>
                          <div class="back box-1 float-left text-center mbox-1 font-size-14"><b class="font-size-14">BACK</b></div>
                          <div class="lay box-1 mbox-1 float-left text-center font-size-14"><b class="font-size-14">LAY</b></div>
                          <div class="box-1 float-left mobileOddsHide"></div>
                          <div class="box-1 float-left mobileOddsHide"></div>
                        </div>
                        <div data-title="OPEN" class="table-body ODDS">

                          @if (!empty($data['odd']))
                          @foreach($data['odd'] as $key=>$team)
                          <div data-title="ACTIVE" class="table-row oddsTot oddssteam{{$key}}">
                            <div class="float-left country-name mbox-4 box-4">
                                <span class="oddteamname<?= $key+1 ?> team-name{{$key}}"><b class="teamName">{{$team['nat']}}</b></span>
                              <p>
                                  <span class="float-left matchValClear matchValClearProfit finaltot" style="color: black;">0</span>
                                  <span class="float-right matchValClearProfit" style="display: none; color: black;">0</span>
                              </p>
                            </div>
                            <div class="box-1 back2 float-left mobileOddsHide back-2 text-center">
                                <span class="odd d-block back3t"></span>
                                <span class="d-block back3k"></span>
                            </div>
                            <div class="box-1 back1 float-left mobileOddsHide back-1 text-center">
                                <span class="odd d-block back2t"></span>
                                <span class="d-block back2k"></span>
                            </div>
                            <div class="box-1 mbox-1 back float-left back lock text-center">
                                <span class="odd d-block font-size-14 back1t"></span>
                                <span class="d-block back1k"></span>
                            </div>
                            <div class="box-1 mbox-1 lay float-left text-center">
                                <span class="odd d-block font-size-14 lay1t"></span>
                                <span class="d-block lay1k"></span>
                            </div>
                            <div class="box-1 lay1 float-left mobileOddsHide text-center">
                                <span class="odd d-block lay2t"></span>
                                <span class="d-block lay2k"></span>
                            </div>
                            <div class="box-1 lay2 mobileOddsHide float-left text-center">
                                <span class="odd d-block lay3t"></span>
                                <span class="d-block lay3k"></span>
                            </div>
                          </div>
                            @endforeach
                            @endif
                        </div>

                      </div>
                      <div class="row row5 bookmaker-market mt-1 rootClass desktopodds">
                        <div class="bm1 col-12">
                          <div>
                            <div class="market-title mt-1">
                            <div class="row">
                              <div class="col-sm-4 boolmakertitlediv"> Bookmaker market</div>
                                <div class="col-sm-4 boolmakerNotesdiv">BOOKIE BHAV 0% COMM. 0 SEC DELAY</div>
                                <div class="col-sm-4 boolmakerminmaxdiv">
                                    <a href="javascript:void(0)" onclick="showRules('BOOKMAKER');" class="m-r-5 game-rules-icon"><span><i class="fa fa-info-circle float-right"></i></span></a>
                                    <b>
                                        <span class="destopViewBetLimit float-right m-r-10">
                                          @if(!empty($sports->bookmaker_min_limit))
                                            <span style="padding-right: 10px;">Min : <span>{{$sports->bookmaker_min_limit}}</span></span>
                                          @endif
                                          @if(!empty($sports->bookmaker_max_limit))
                                            <span> Max : <span>{{$sports->bookmaker_max_limit}}</span></span>
                                          @endif
                                        </span>
                                      </b>
                                </div>
                                </div>
                                    <!-- Hidden Value Of Max & Min Limit -->
                                <input type="hidden" class="MatchBookmaker" id="oddsMax" value="{{$sports->bookmaker_max_limit}}">
                                <input type="hidden" class="MatchBookmaker" id="oddsMin" value="{{$sports->bookmaker_min_limit}}">
                                <input type="hidden" class="MatchBookmaker" id="betType" value="BOOKMAKER">

                              <!-- End Hidden -->
                            </div>
                            <div class="table-header avoid-clicks">
                            <div class="float-left country-name box-4">
                                <span class="mobileViewBetLimit float-right m-r-10">
                                    @if(!empty($sports->bookmaker_min_limit))
                                      <span style="padding-right: 10px;">Min : <span>{{$sports->bookmaker_min_limit}}</span></span>
                                    @endif
                                    @if(!empty($sports->bookmaker_max_limit))
                                      <span>Max : <span>{{$sports->bookmaker_max_limit}}</span></span>
                                    @endif
                                </span>
                            </div>
                              <div class="box-1 float-left"></div>
                              <div class="box-1 float-left"></div>
                              <div class="back box-1 float-left text-center font-size-14"><b class="font-size-14">BACK</b></div>
                              <div class="lay box-1 float-left text-center font-size-14"><b class="font-size-14">LAY</b></div>
                              <div class="box-1 float-left"></div>
                              <div class="box-1 float-left"></div>
                            </div>
                            <div class="table-body BOOKMAKER">
                            @if (!empty($data['bookmaker']))
                                @foreach($data['bookmaker'] as $key=>$team)
                                <div data-title="ACTIVE" class="table-row oddsTot bookmaker{{$key}} ">
                                  <div class="float-left  country-name box-4">
                                    <span class="bookmakerteamname<?= $key+1 ?> team-name{{$key}}"><b class="teamName font-size-14">{{$team['nat']}}</b></span>
                                    <p>
                                        <span class="float-left matchValClear matchValClearProfit finaltot" style="color: black;">0</span>
                                        <span class="float-right matchValClearProfit " style="display: none; color: black;">0</span>
                                    </p>
                                  </div>
                                  <div class="box-1 back2 float-left back-2 text-center">
                                      <span class="odd d-block font-size-14 back3t"></span>
                                      <span class="d-block back3k"></span>
                                  </div>
                                  <div class="box-1 back1 float-left font-size-14 back-1 text-center">
                                      <span class="odd d-block font-size-14 back2t"></span>
                                      <span class="d-block back2k"></span>
                                  </div>
                                  <div class="box-1 back float-left back lock text-center">
                                      <span class="odd d-block font-size-14 back1t"></span>
                                      <span class="d-block back1k"></span>
                                  </div>
                                  <div class="box-1 lay float-left text-center">
                                      <span class="odd d-block font-size-14 lay1t"></span>
                                      <span class="d-block lay1k"></span>
                                  </div>
                                  <div class="box-1 lay1 float-left text-center">
                                      <span class="odd d-block font-size-14 lay2t"></span>
                                      <span class="d-block lay2k"></span>
                                  </div>
                                  <div class="box-1 lay2 float-left text-center">
                                      <span class="odd d-block font-size-14 lay3t"></span>
                                      <span class="d-block lay3k"></span>
                                  </div>
                                </div>



                              @endforeach

                            @endif

                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                    <div class="fancy-market row row5 mobileodds">
                      <div class="col-12">
                        <div>
                          <div class="market-title mt-1">
                            Session Market

                            <a href="javascript:void(0)" onclick="showRules('SESSION');"  class="m-r-5 game-rules-icon">
                                <span><i class="fa fa-info-circle float-right"></i></span></a>
                          </div>
                          <div class="fancy-tripple avoid-clicks">
                              <div id="suspended" data-title="" class="table-row">
                                <div class="mbox-4 float-left country-name box-6" style="border-bottom: 0px none;">
                                    <span class="mobileViewBetLimit d-block">Min: <span>{{$sports->fancy_min_limit}} </span></span>
                                    <span class="mobileViewBetLimit d-block">&nbsp;&nbsp;Max: <span>{{$sports->fancy_max_limit}}</span></span>
                                </div>

                                <div class="lay float-left text-center mbox-1" style="width: 13%;min-width: 13%;max-width: 13%;">
                                  <span class="odd d-block font-size-14">NO</span>
                                </div>
                                <div class="back float-left text-center mbox-1" style="width: 13%;min-width: 13%;max-width: 13%;">
                                  <span class="odd d-block font-size-14">YES</span>
                                </div>
                                <div class="destopViewBetLimit box-2 float-left text-right min-max" style="border-bottom: 0px none;">
                                    <input type="hidden" id="ses_min_bet" value="{{$sports->fancy_min_limit}}">
                                    <input type="hidden" id="ses_max_bet" value="{{$sports->fancy_max_limit}}">
                                </div>
                              </div>
                           </div>

                          <div class="table-body rootClass addSessionMarket">
                            <input type="hidden" class="SESSION" id="betType" value="SESSION">
                            @if(isset($dataArr['session']))
                            @foreach($dataArr['session'] as $key=>$session)
                               <div class="fancy-tripple SESSIONCount SESSION SES_{{$key}}">
                                  <div id="suspended" data-title="" class="table-row">
                                    <div class="mbox-4 float-left country-name box-6" style="border-bottom: 0px none;">
                                     <span class="bookmakerteamname2 team-name1"><b class="team">{{$session['RunnerName']}}</b></span>
                                      <a href="javascript:void(0);" style="display:none;" class="showBookBtn btn btn-primary tableman_btn pull-right" onclick="showBookSession(this);">Book</a>
                                      <br><p style="color: black;">0</p>
                                   </div>
                                    <div class="mbox-1 box-1 lay float-left text-center">
                                      <span class="odd font-size-14 d-block">{{$session['LayPrice1']}}</span>
                                      <span class="oddk">{{$session['LaySize1']}}</span>
                                    </div>
                                    <div class="mbox-1 box-1 back float-left text-center">
                                      <span class="odd font-size-14 d-block">{{$session['BackPrice1']}}</span>
                                      <span class="oddk">{{$session['BackSize1']}}</span>
                                    </div>
                                    <div class="destopViewBetLimit box-2 float-left text-right min-max" style="border-bottom: 0px none;">
                                        <input type="hidden" class="seq" value="{{$key}}">
                                     <span class="d-block">Min: <span>{{$sports->fancy_min_limit}}</span></span>
                                      <span class="d-block">Max: <span>{{$sports->fancy_max_limit}}</span></span>
                                    </div>
                                  </div>
                               </div>
                            @endforeach
                            @endif
                          </div>
                          <div>
                          </div>
                        </div>
                      </div>
                    </div>
                   <div class="markets mobilebetsdata" style="display: none;">
                      <div id="myBet" class="card-body">
                        <table class="coupon-table table  table-borderedless">
                          <thead>
                            <tr>
                              <th style="width: 60%;">
                                Team Name
                              </th>
                              <th class="text-left">
                                Odds
                              </th>
                              <th class="text-left">
                                Stake
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td colspan="3" class="text-center">No records Found</td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
        <div id="sidebar-right" class="col-md-3 sidebar-right sidebar-right-bar" style="position: relative; top: 0px; right: 0px; width: 25.5%;">
          <div class="ps">
            <div class="sidebar-right-inner">
              <div class="card m-b-10" style="border: 0px none;">
                <div class="card-header">
                    <h6 onclick="showTv();" class="card-title">Live Match
                    <span class="float-right"><i class="fa fa-tv"></i> live stream started
                    </span>
                  </h6>
                </div>

                <div id="tv_status-errordetail" style="background: var(--theme2-bg);" class="tv-container collapse" align="center">
                  <ul class="nav nav-tabs video_nav_tab">
                      <li onclick="showTvVideo('tv1',this);" class="nav-item navli">Chanel 1</li>
                      <li onclick="showTvVideo('tv2',this);" class="nav-item navli">Chanel 2</li>
                      <li onclick="showTvVideo('tv3',this);" class="nav-item navli">Chanel 3</li>
                      <li onclick="showTvVideo('tv4',this);" class="nav-item navli">Chanel 4</li>
                  </ul>
                  <div  class="allVideo" id="tv1">
                      <iframe src="{{$adminSetting->TV_URL_1}}"
                              class="video-iframe"></iframe>
                  </div>
                  <div style="display:none;" class="allVideo" id="tv2">
                      <iframe src="{{$adminSetting->TV_URL_2}}"
                              class="video-iframe"></iframe>
                  </div>
                  <div style="display:none;" class="allVideo" id="tv3">
                      <iframe src="{{$adminSetting->TV_URL_3}}"
                              class="video-iframe"></iframe>
                  </div>
                  <div style="display:none;" class="allVideo" id="tv4">
                      <iframe src="{{$adminSetting->TV_URL_4}}"
                              class="video-iframe"></iframe>
                  </div>
                </div>
              </div>
              <div class="card m-b-10 place-bet">
                <div class="card-header">
                    <h6 onclick="showBet();" class="card-title d-inline-block">Place Bet</h6>
                </div>
                  <div id="showBet" class="collapse"  >

                    <form>
                      <table class="coupon-table table table-borderedless">
                        <thead>
                          <tr>
                            <th></th>
                            <th style="width: 35%; text-align: left;">(Bet for)</th>
                            <th style="width: 25%; text-align: left;">Odds</th>
                            <th style="width: 15%; text-align: left;">Stake</th>
                            <th style="width: 15%; text-align: right;">Profit</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-center">
                                <a href="javascript:void(0);" onclick="showBet();" class="text-danger">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                            <td id="teamNameBet"></td>
                            <td class="bet-odds">
                              <div class="form-group">
                                <input placeholder="0" type="text" required="required" maxlength="4" readonly="readonly" class="amountint" style="width: 45px; vertical-align: middle;">
                              </div>
                            </td>
                            <td class="bet-stakes">
                              <div class="form-group bet-stake">
                                  <input maxlength="10" name="betAmount" id="betAmount" type="number" required="required" type="text">
                              </div>
                            </td>
                            <td id="bet-profit" class="text-right bet-profit"></td>
                          </tr>
                          <tr>
                            <td colspan="5" class="value-buttons" style="padding: 5px;">
                              <button type="button" data-bet="{{$buttonValue['price'][0]}}" class="btn btn-secondary m-l-5 m-b-5">
                                {{$buttonValue['label'][0]}}
                              </button><button type="button" data-bet="{{$buttonValue['price'][1]}}" class="btn btn-secondary m-l-5 m-b-5">
                              {{$buttonValue['label'][1]}}
                              </button><button type="button" data-bet="{{$buttonValue['price'][2]}}" class="btn btn-secondary m-l-5 m-b-5">
                              {{$buttonValue['label'][2]}}
                              </button><button type="button" data-bet="{{$buttonValue['price'][3]}}" class="btn btn-secondary m-l-5 m-b-5">
                              {{$buttonValue['label'][3]}}
                              </button><button type="button" data-bet="{{$buttonValue['price'][4]}}" class="btn btn-secondary m-l-5 m-b-5">
                              {{$buttonValue['label'][4]}}
                              </button><button type="button" data-bet="{{$buttonValue['price'][5]}}" class="btn btn-secondary m-l-5 m-b-5">
                              {{$buttonValue['label'][5]}}
                              </button><button type="button" data-bet="{{$buttonValue['price'][6]}}" class="btn btn-secondary m-l-5 m-b-5">
                              {{$buttonValue['label'][6]}}
                              </button><button type="button" data-bet="{{$buttonValue['price'][7]}}" class="btn btn-secondary m-l-5 m-b-5">
                              {{$buttonValue['label'][7]}}
                              </button><button type="button" data-bet="{{$buttonValue['price'][8]}}" class="btn btn-secondary m-l-5 m-b-5">
                              {{$buttonValue['label'][8]}}
                              </button><button type="button" data-bet="{{$buttonValue['price'][9]}}" class="btn btn-secondary m-l-5 m-b-5">
                              {{$buttonValue['label'][9]}}
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table

                      <div class="col-md-12">
                        <input type="hidden" id="betTypeAdd" value="">
                        <input type="hidden" id="betSide" value="">
                        <input type="hidden" id="betTeamProfit" value="">
                        <input type="hidden" id="betOddk" value="">
                        <input type="hidden"  class="betPosition"  id="betPosition" value="">
                        <span class="" id="betMsgALL"></span>
                        <button type="button" onclick="myBet();" class="btn btn-sm btn-danger float-left">
                        Reset
                        </button>

                        <button type="button" onclick="saveBet();" class="btn btn-sm btn-success float-right m-b-5">
                          <!----> Submit
                        </button>
                      </div>

                    </form>
                  <!--</div>-->
                <!---->
              </div>
              <div class="card m-b-10 my-bet">
                <div class="card-header">
                    <h6 onclick="showMyBet();" class="card-title d-inline-block">My Bet</h6>
                </div>
                <div id="myBet" class="card-body" style="overflow: auto;max-height: 500px;">
                  <table class="coupon-table table  table-borderedless">
                    <thead>
                      <tr>
                        <th style="width: 60%;">
                          Team Name
                        </th>
                        <th class="text-left">
                          Odds
                        </th>
                        <th class="text-left">
                          Stake
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td colspan="3" class="text-center">No records Found</td>
                    </tr>

                    </tbody>
                  </table>
                </div>
              </div>
              <!---->
            </div>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
              <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
              <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-left headingText">Modal Header</h4>
          <!--<span  class="close" data-dismiss="modal">&times;</span>-->
        </div>
        <div class="modal-body" id="modelBodyID">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <div class="modal fade" id="myModalBetView" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-left headingText">Place Bet</h4>
          <span  class="close" data-dismiss="modal">&times;</span>
        </div>
          <div class="modal-body" id="modelBodyID" style="padding: 3px;padding-top: 12px;">

            <div id="showBet" class="collapse" style="display: block;">

            <form>
              <table class="coupon-table table table-borderedless">
                <tbody>
                    <tr>
                        <td id="teamNameBet" colspan="2"></td>
                        <td class="pull-right float-right">
                            <div class="form-group">
                              <input placeholder="0" type="text" required="required" maxlength="4" readonly="readonly" class="amountint" style="width: 75px; vertical-align: middle;">
                            </div>
                        </td>
                    </tr>
                  <tr>
                    <td class="bet-stakes pull-left">
                      <div class="form-group bet-stake">
                          <input maxlength="10" style="margin-top: 18px;" name="betAmount" id="betAmount" type="text" required="required" type="text">
                      </div>
                    </td>
                    <td>
                        <button type="button" onclick="saveBet();" class="btn btn-sm btn-success submitBtn m-b-5">Submit</button>
                    </td>
                    <td id="bet-profit" class="text-right bet-profit text-center">0</td>
                  </tr>
                  <tr>
                    <td colspan="3" class="value-buttons" style="padding: 5px;">
                      <button type="button" data-bet="{{$buttonValue['price'][0]}}" class="btn btn-secondary m-l-5 m-b-5">
                        {{$buttonValue['label'][0]}}
                      </button><button type="button" data-bet="{{$buttonValue['price'][1]}}" class="btn btn-secondary m-l-5 m-b-5">
                      {{$buttonValue['label'][1]}}
                      </button><button type="button" data-bet="{{$buttonValue['price'][2]}}" class="btn btn-secondary m-l-5 m-b-5">
                      {{$buttonValue['label'][2]}}
                      </button><button type="button" data-bet="{{$buttonValue['price'][3]}}" class="btn btn-secondary m-l-5 m-b-5">
                      {{$buttonValue['label'][3]}}
                      </button><button type="button" data-bet="{{$buttonValue['price'][4]}}" class="btn btn-secondary m-l-5 m-b-5">
                      {{$buttonValue['label'][4]}}
                      </button><button type="button" data-bet="{{$buttonValue['price'][5]}}" class="btn btn-secondary m-l-5 m-b-5">
                      {{$buttonValue['label'][5]}}
                      </button><button type="button" data-bet="{{$buttonValue['price'][6]}}" class="btn btn-secondary m-l-5 m-b-5">
                      {{$buttonValue['label'][6]}}
                      </button><button type="button" data-bet="{{$buttonValue['price'][7]}}" class="btn btn-secondary m-l-5 m-b-5">
                      {{$buttonValue['label'][7]}}
                      </button><button type="button" data-bet="{{$buttonValue['price'][8]}}" class="btn btn-secondary m-l-5 m-b-5">
                      {{$buttonValue['label'][8]}}
                      </button><button type="button" data-bet="{{$buttonValue['price'][9]}}" class="btn btn-secondary m-l-5 m-b-5">
                      {{$buttonValue['label'][9]}}
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table

              <div class="col-md-12">
                <input type="hidden" id="betTypeAdd" value="">
                <input type="hidden" id="betSide" value="">
                <input type="hidden" id="betTeamProfit" value="">
                <input type="hidden" id="betOddk" value="">
                <input type="hidden" class="betPosition"   id="betPosition" value="">
                <span class="" id="betMsgALL"></span>

            </form>
              <table class="table showbetTot table-borderedless">

              </table>
          </div>
        </div>
        </div>
    </div>
  </div>

</div>
<div id="modelID"></div>

@endsection
@push('after-styles')
<style>
    .video_nav_tab li{
      padding: 4px 13px;
      background: var(--theme2-bg);
      width: 25%;
      color:var(--secondary-color);
    }
    .video-iframe {
    border: 0;
    background: #222;
    height: auto;
    width: 100%;
}
</style>
@endpush
<script src="{{asset('new/sportJS/cricket.js')}}"></script>
@push('after-scripts')
@include('frontend.game-list.js.sideBarScroll')
@include('frontend.game-list.js.mobileViewJS')

  <script type="text/javascript">
 var delay = "{{$delay}}";

 </script>
  <script type="text/javascript">
    var isMobile = false; //initiate as false
    // device detection
    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
        || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
        isMobile = true;
        $('#sidebar-right').remove();
        $('.SBDESTOP').remove();
    }else{
      $('.mobilebetOdds').remove();
      $('#myModalBetView').remove();
      $('.SBMOBILE').remove();
    }

    getData();
    $( document ).ready(function() {
      setInterval(function(){ getData(); }, 2000);

    });
    $( document ).ready(function() {
      setInterval(function(){ getBetsList(); }, 3000);
    });
    $( "#myModalBetView" ).on('shown.bs.modal', function (e) {
        $('.navbar ').hide();

    });
    $('#myModalBetView').on('hidden.bs.modal', function () {
        $('.navbar ').show();
        clearBetVal();
    })
function getData(){
    $.ajax({
        url: '{{route("frontend.getdata",$sports->match_id)}}',
        dataType: 'json',
        type: "get",
        success: function(data){
            if(data.matchSuspended == true){
                $('.addSessionMarket').attr('data-title','SUSPENDED');
                $('.addSessionMarket').addClass('suspended');
                $('.BOOKMAKER').attr('data-title','SUSPENDED');
                $('.BOOKMAKER').addClass('suspended');
                $('.ODDS').attr('data-title','SUSPENDED');
                $('.ODDS').addClass('suspended');
            }else{
                $('.addSessionMarket').attr('data-title','Active');
                $('.addSessionMarket').removeClass('suspended');
                $('.BOOKMAKER').attr('data-title','Active');
                $('.BOOKMAKER').removeClass('suspended');
                $('.ODDS').attr('data-title','Active');
                $('.ODDS').removeClass('suspended');
            }
            if(data.matchDeclear == true){
                $('.addSessionMarket').attr('data-title','SUSPENDED');
                $('.addSessionMarket').addClass('suspended');
                $('.BOOKMAKER').attr('data-title','SUSPENDED');
                $('.BOOKMAKER').addClass('suspended');
                $('.ODDS').attr('data-title','SUSPENDED');
                $('.ODDS').addClass('suspended');
                redirectHome();
            }else{

                setodd(data.odd);
                if (typeof data.SB !== 'undefined') {
                    $('.scorecard').show();
                    setSB(data.SB);
                }else{
                    $('.scorecard').hide();
                }
                setbookmaker(data.bookmaker['bm1']);
                addnewSession(data.session);
            }
        }
    });
}

function showBookSession(obj){
      var teamname = $(obj).closest('.country-name').find('.team').text();
      $.ajax({
        url: '{{route("frontend.my-bets.getSessionBetData")}}',
        dataType: 'text',
        type: "POST",
        data : 'match_id={{$sports->match_id}}&_token={{csrf_token()}}&teamName='+teamname,
        success: function(data){
          $("#modelBodyID").html('');
          $('.headingText').text('');
          $('.headingText').text(teamname);
          $("#modelBodyID").html(data);
          $("#myModal").modal({
            show:true
          });
        }
      });
    }



function saveBet(){
  var bet_type = $('#betTypeAdd').val();
  showLoading('showBet');

  if(parseInt(delay) > 0){
    if(bet_type == 'ODDS'){
      setTimeout( function () {
        saveBetcall();
    },parseInt(delay));
    }else{
      saveBetcall();
    }
  }else{
    saveBetcall();
  }
  clearBetVal();
}
function saveBetcall(){
      var suspendedMsg = '<div class="alert alert-danger">Game suspended bet not allowed</div>';
      var bet_type = $('#betTypeAdd').val();
      var bet_site = $('#betSide').val();
      var bet_odds = $('.amountint').val();
      var team_name = $('#teamNameBet').text();
      var bet_amount = $('#betAmount').val();
      var betPosition =  $('.betPosition').val();
      if(bet_amount == '' || bet_amount <= 0 || isNaN(bet_amount)){
        $('#betMsgALL').html('<div  id="msg-alert" class="alert alert-danger"><button type="button" class="close" style="margin-top: -7px;" data-dismiss="alert">x</button>Min Max Bet Limit Exceed</div>');
        betMsgEmpty();
        hideLoading('showBet');
        return false;
    }
      if(bet_type == 'BOOKMAKER'){
                var team1 = $('.BOOKMAKER').find('.bookmakerteamname1 > .teamName').text();
                var team2 = $('.BOOKMAKER').find('.bookmakerteamname2 > .teamName').text();
                if(team1 == team_name){
                   obj = $('.BOOKMAKER').find('.bookmaker0 > .'+betPosition);
                }else if(team2 == team_name){
                   obj = $('.BOOKMAKER').find('.bookmaker1 > .'+betPosition);
                }else{
                   obj = $('.BOOKMAKER').find('.bookmaker2 > .'+betPosition);
                }
                var newOdds = $(obj).find('.odd').text();
                if(bet_odds != newOdds){
                    $('#betMsgALL').html("<div class='alert alert-danger'>Bet Not Confirm Reason Odds Change</div>");
                    betMsgEmpty();
                    hideLoading('showBet');
                     if(isMobile){
                       setTimeout(function(){ $('#myModalBetView').modal('hide'); }, 1000);
                    }
                    return false;
                }
        }



      if(bet_type == 'ODDS'){
        if(bet_odds >= 5){
            $('#betMsgALL').html('<div  id="msg-alert" class="alert alert-danger"><button type="button" class="close" style="margin-top: -7px;" data-dismiss="alert">x</button>Bet Not Accept Rate Over 4.00 on Oneday and T20</div>');
            betMsgEmpty();
            hideLoading('showBet');
            return false;
        }
        var team1 = $('.ODDS').find('.oddteamname1 > b').text();
        var team2 = $('.ODDS').find('.oddteamname2 > b').text();
        if(bet_site == 'lay'){
          if(team1 == team_name){
            obj = $('.ODDS').find('.oddteamname1 > b');
            var bet_odds = $(obj).closest('.table-row').find('.lay1t').text();
          }else if(team2 == team_name){
            obj = $('.ODDS').find('.oddteamname2 > b');
            var bet_odds = $(obj).closest('.table-row').find('.lay1t').text();
          }else{
            obj = $('.ODDS').find('.oddteamname3 > b');
            var bet_odds = $(obj).closest('.table-row').find('.lay1t').text();
          }
        }else{
          if(team1 == team_name){
            obj = $('.ODDS').find('.oddteamname1 > b');
            var bet_odds = $(obj).closest('.table-row').find('.back1t').text();
          }else if(team2 == team_name){
            obj = $('.ODDS').find('.oddteamname2 > b');
            var bet_odds = $(obj).closest('.table-row').find('.back1t').text();
          }else{
            obj = $('.ODDS').find('.oddteamname3 > b');
            var bet_odds = $(obj).closest('.table-row').find('.back1t').text();
          }
        }
        $('.amountint').val(bet_odds);



        if(bet_type == 'ODDS' || bet_type == 'BOOKMAKER'){
          betODDCalculation(bet_amount);
        }
        var bet_type = $('#betTypeAdd').val();
        var bet_site = $('#betSide').val();
        var bet_odds = $('.amountint').val();
        var team_name = $('#teamNameBet').text();

      }
      if(bet_type == 'SESSION'){
                var isRunningSession = false;
                $('.SESSIONCount').each(function(){
                    if($(this).find('.team').text()==team_name){
                        var newOdds = $(this).closest('.SESSIONCount').find('.'+betPosition +" > .odd").text();
                        if(bet_odds != newOdds){
                            $('#betMsgALL').html("<div class='alert alert-danger'>Bet Not Confirm Reason Odds Change</div>");
                            betMsgEmpty();
                            hideLoading('showBet');
                             if(isMobile){
                               setTimeout(function(){ $('#myModalBetView').modal('hide'); }, 1000);
                            }
                            return false;
                        }
                        isRunningSession = true;
                    }
                });
            if(isRunningSession == false){
                var sesNotActiveMsg = '<div class="alert alert-danger">Session not available for bet</div>';
                $('#betMsgALL').html(sesNotActiveMsg);
                betMsgEmpty();
                hideLoading('showBet');
                return false;
            }
      }
      var teamname1 = $('.ODDS').find('.oddteamname1 > b').text();
      var teamname2 = $('.ODDS').find('.oddteamname2 > b').text();
      var teamname3 = $('.ODDS').find('.oddteamname3 > b').text();
      var count = 2;
//      normal 2 ma check akrvanu
      if(teamname3 != "") {
        count = 3;
      }
      if(bet_type == 'ODDS'){
        var suspendedCount = $('.ODDS').find('.suspended').length;
        if(suspendedCount == count){
          $('#betMsgALL').html(suspendedMsg);
          betMsgEmpty();
          hideLoading('showBet');
          return false;
        }
        if(suspendedCount > 0){
          var teams = $('.ODDS').find('.suspended .team-name0 b').text();
          if(teams == team_name){
            $('#betMsgALL').html(suspendedMsg);
            betMsgEmpty();
            hideLoading('showBet');
            return false;
          }
        }

      }else if(bet_type == 'BOOKMAKER'){
        var suspendedCount = $('.BOOKMAKER').find('.suspended').length;
        if(suspendedCount == count){
          $('#betMsgALL').html(suspendedMsg);
          betMsgEmpty();
          hideLoading('showBet');
          return false;
        }
        if(suspendedCount > 0){
          var teams = $('.BOOKMAKER').find('.suspended .team-name0 b').text();
          if(teams == team_name){
            $('#betMsgALL').html(suspendedMsg);
            betMsgEmpty();
            hideLoading('showBet');
            return false;
          }
        }
      }else if(bet_type == 'SESSION'){
        obj = $('.addSessionMarket').find('.suspended');
        var suspendedCount = obj.length;
        var temp = 0;
        if(suspendedCount > 0){
          $(obj).each(function(){
            if($(this).find('.team').text()==team_name){
              $('#betMsgALL').html(suspendedMsg);
              betMsgEmpty();
              temp = 1;
              hideLoading('showBet');
              return false;
            }
          });
        }
        if(temp == 1){
          betMsgEmpty();
          hideLoading('showBet');
          hideLoading('showBet');
          return false;
        }
      }
      var bet_amount = $('#betAmount').val();
      var bet_amountK = $('#betOddk').val();
      var team_name = $('#teamNameBet').text();
      var bet_profit = $('#bet-profit').text();
      var parameter = "";
      if(bet_type != 'SESSION'){

        var teamname1 = $('.ODDS').find('.oddssteam0 .teamName').text();
        var teamname2 = $('.ODDS').find('.oddssteam1 .teamName').text();
        var teamname3 = $('.ODDS').find('.oddssteam2 .teamName').text();
        if(teamname1 == team_name){
          parameter = "&teamname2="+encodeURIComponent(teamname2)+"&teamname3="+encodeURIComponent(teamname3);
        }else if(teamname2 == team_name){
          parameter = "&teamname1="+encodeURIComponent(teamname1)+"&teamname3="+encodeURIComponent(teamname3);
        }else{
          parameter = "&teamname1="+encodeURIComponent(teamname1)+"&teamname2="+encodeURIComponent(teamname2);
        }
      }
      if(bet_amount == '' || bet_amount <= 0 || isNaN(bet_amount)){
        $('#betMsgALL').html('<div  id="msg-alert" class="alert alert-danger"><button type="button" class="close" style="margin-top: -7px;" data-dismiss="alert">x</button>Min Max Bet Limit Exceed</div>');
        betMsgEmpty();
        hideLoading('showBet');
        return false;
    }
    if(bet_odds == '' || bet_odds <= 0 || isNaN(bet_odds)){
        $('#betMsgALL').html('<div  id="msg-alert" class="alert alert-danger"><button type="button" class="close" style="margin-top: -7px;" data-dismiss="alert">x</button>Bet Odds changed</div>');
        betMsgEmpty();
        hideLoading('showBet');
        return false;
    }
    if(bet_type == 'ODDS'){
        if(bet_odds >= 5){
            $('#betMsgALL').html('<div  id="msg-alert" class="alert alert-danger"><button type="button" class="close" style="margin-top: -7px;" data-dismiss="alert">x</button>Bet Not Accept Rate Over 4.00 on Oneday and T20</div>');
            betMsgEmpty();
            hideLoading('showBet');
            return false;
        }
    }
        $.ajax({
          url: '{{route("frontend.my-bets.store")}}',
          dataType: 'json',
          type: "POST",
          data : "sportID={{$sports->id}}&match_id={{$sports->match_id}}&_token={{csrf_token()}}&bet_profit="+bet_profit+"&bet_type="+bet_type+"&bet_side="+bet_site+"&bet_odds="+bet_odds+"&bet_amount="+bet_amount+"&bet_oddsK="+bet_amountK+"&team_name="+encodeURIComponent(team_name)+parameter,
          complete:function(){
              hideLoading('showBet');
          },
          success: function(data){
            $('#betMsgALL').html(data.message);
            if(data.status == true){
              $('.rootClass').find('.country-name .float-right ').text('');
              $('#bet-profit').text('');
              $('#betAmount').val('');
              $('.amountint').val('');
            }
            betMsgEmpty();
            hideLoading('showBet');
             if(isMobile){
                setTimeout(function(){ $('#myModalBetView').modal('hide'); }, 1000);
             }
          }
        });

    }

    function getBetsList(){
      $.ajax({
        url: '{{route("frontend.my-bets.list")}}',
        dataType: 'json',
        type: "POST",
        cache: false,
        async: false,
        data: 'sportID={{$sports->id}}&_token={{csrf_token()}}&match_id={{$sports->match_id}}',
        success: function(dataJson){
          $('.showBookBtn').hide();
          $('.finaltot').text('');
          $('#myBet  tbody').html(dataJson.myBetData);
          if (typeof dataJson.exposureAmt !== 'undefined') {
            $('#headerExposureLimit').text(calc(dataJson.exposureAmt));
          }
          if (typeof dataJson.headerUserBalance !== 'undefined') {
            $('#headerUserBalance').text(calc(dataJson.headerUserBalance));
          }
          if (typeof dataJson.ODDS !== 'undefined') {
          $.each(dataJson.ODDS, function(i, data) {
              var teamname = $('.ODDS').find('.oddteamname1 > b').text();
              var teamname1 = $('.ODDS').find('.oddteamname2 > b').text();
              if(teamname == i){
                objteam1 = $('.ODDS').find('.oddteamname1 > b');
                objteam2 = $('.ODDS').find('.oddteamname2 > b');

                if(parseFloat(data.ODDS_profitLost) >= 0){
                  $(objteam1).closest('.country-name').find('.float-left').css('color','green');
                }else{
                  $(objteam1).closest('.country-name').find('.float-left').css('color','red');
                }

                $(objteam1).closest('.country-name').find('.float-left').text(data.ODDS_profitLost);
              }else if(teamname1 == i){
                objteam2 = $('.ODDS').find('.oddteamname2 > b');
                if(parseFloat(data.ODDS_profitLost) >= 0){
                  $(objteam2).closest('.country-name').find('.float-left').css('color','green');
                }else{
                  $(objteam2).closest('.country-name').find('.float-left').css('color','red');
                }
                $(objteam2).closest('.country-name').find('.float-left').text(data.ODDS_profitLost);
              }else{
                objteam3 = $('.ODDS').find('.oddteamname3 > b');
                if(parseFloat(data.ODDS_profitLost) >= 0){
                  $(objteam3).closest('.country-name').find('.float-left').css('color','green');
                }else{
                  $(objteam3).closest('.country-name').find('.float-left').css('color','red');
                }
                $(objteam3).closest('.country-name').find('.float-left').text(data.ODDS_profitLost);
              }
          });
          }
          if (typeof dataJson.BOOKMAKER !== 'undefined') {
          $.each(dataJson.BOOKMAKER, function(i, data) {
            var teamname = $('.BOOKMAKER').find('.bookmakerteamname1 > b').text();
            var teamname1 = $('.BOOKMAKER').find('.bookmakerteamname2 > b').text();

            if(teamname == i){
              objteam1 = $('.BOOKMAKER').find('.bookmakerteamname1 > b');

              if(parseFloat(data.BOOKMAKER_profitLost) >= 0){
                $(objteam1).closest('.country-name').find('.float-left').css('color','green');
              }else{
                $(objteam1).closest('.country-name').find('.float-left').css('color','red');
              }

              $(objteam1).closest('.country-name').find('.float-left').text(data.BOOKMAKER_profitLost);
            }else if(teamname1 == i){
              objteam2 = $('.BOOKMAKER').find('.bookmakerteamname2 > b');
              if(parseFloat(data.BOOKMAKER_profitLost) >= 0){
                $(objteam2).closest('.country-name').find('.float-left').css('color','green');
              }else{
                $(objteam2).closest('.country-name').find('.float-left').css('color','red');
              }
              $(objteam2).closest('.country-name').find('.float-left').text(data.BOOKMAKER_profitLost);
            }else{
              objteam3 = $('.BOOKMAKER').find('.bookmakerteamname3 > b');
              if(parseFloat(data.BOOKMAKER_profitLost) >= 0){
                $(objteam3).closest('.country-name').find('.float-left').css('color','green');
              }else{
                $(objteam3).closest('.country-name').find('.float-left').css('color','red');
              }
              $(objteam3).closest('.country-name').find('.float-left').text(data.BOOKMAKER_profitLost);
            }
         });
          }
          if (typeof dataJson.SESSION !== 'undefined') {

          $.each(dataJson.SESSION, function(i, data){
              $('.SESSION').each(function(){
                var teamName = $(this).find('.team').text();
                if(teamName == data){
                  $(this).find('.showBookBtn').show();
                }
              });
          });
          }
        }
      });
    }

    $( document ).ready(function() {

      $('.box-1').on('click',function(){
        var betType = $(this).closest('.rootClass').find('#betType').val();
        if($(this).hasClass('back')){
            betPosition = 'back';
        }else if($(this).hasClass('back1')){
            betPosition = 'back1';
        }else if($(this).hasClass('back2')){
            betPosition = 'back2';
        }else if($(this).hasClass('lay')){
            betPosition = 'lay';
        }else if($(this).hasClass('lay1')){
            betPosition = 'lay1';
        }else if($(this).hasClass('lay2')){
            betPosition = 'lay2';
        }
        $('.betPosition').val(betPosition);
        if(isMobile){
        var amount = $(this).find('.odd').text();
        if(amount == 0){
          return false
        }


        $('#showBet').show();
        $('.headingText').text('Place Bet');
        $('#myModalBetView').modal('show');

        var html = '';
        var i = 0;
        $('.'+betType+' .oddsTot').each(function(){
          var teamname = $(this).find('.teamName').text();
          var matchValClear = $(this).find('.matchValClear').text();
          if(matchValClear == ''){
            matchValClear = 0;
          }
          var color = "green";
          if(parseInt(matchValClear) < 0){
            color = 'red';
          }
          html +='<tr class="oddstbl'+i+'">';
            html +='<td style="text-align:left;" class="tname">'+teamname+'</td>';
            html +='<td style="text-align:center;color:'+color+'">'+matchValClear+'</td>';
            html +='<td style="text-align:right;" class="profitLoss">0</td>';
          html +='</tr>';
          i++;
        });
        $('.showbetTot').html(html);
      }
          $('.rootClass').find('.country-name .float-right ').text('');
          $('#bet-profit').text('');
          $('#betAmount').val('');

//          $('.box-1').css('border','1px solid #fff');
//          $(this).css('border','2px solid #000');
          var amount = $(this).find('.odd').text();
          var amountK = $(this).find('.oddk').text();
          var countryName = $(this).closest('.table-row').find('.country-name > span').text();
          var betType = $(this).closest('.rootClass').find('#betType').val();
          if(amount == 0){
            return false
          }
          $('.amountint').val(amount);
          $('#betOddk').val(amountK);
          $('#teamNameBet').text(countryName);
          $('#betTypeAdd').val(betType);

          $('#showBet').removeClass('back-color');
          $('#showBet').removeClass('lay-color');

          if(isMobile){
            $('.modal-body').removeClass('back-color');
            $('.modal-body').removeClass('lay-color');
          }

          if($(this).hasClass("back") || $(this).hasClass("back1") || $(this).hasClass("back2")){
            $('#showBet').addClass('back-color');
            $('#betSide').val('back');
            if(isMobile){
              $('.modal-body').addClass('back-color');
            }
          }else{
            $('#showBet').addClass('lay-color');
            $('#betSide').val('lay');
            if(isMobile){
              $('.modal-body').addClass('lay-color');
            }
          }
          if(!$("#showBet").hasClass("show")){
            $('#showBet').addClass('show');
          }

      });

      $('.value-buttons').find('button').on('click',function(){
        var amt = $(this).attr('data-bet');
        $('#betAmount').val(amt);
        betODDCalculation(amt);
      });

      $('#betAmount').on('keyup',function(){
        var amt = $(this).val();
        betODDCalculation(amt);
      });
    });
  </script>

@endpush
