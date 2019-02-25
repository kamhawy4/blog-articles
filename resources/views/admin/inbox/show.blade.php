<?php
DB::table('contact_uses')->where('id',$show->id)->update(['type'=>'show']);
?>
@extends('admin.layout')
@section("title")
Message
@endsection
@section("content")


                                       <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1">
                                              <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                            <div class="portlet blue-hoki box">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-inbox"></i>{{ $show->name }} </div>
                                                                    <div class="actions">
                                                                        <a onclick="window.print();" href="javascript:;" class="btn btn-default btn-sm">
                                                                            <i  class="fa fa-pencil"></i> print </a>
                                                                    </div>
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Email: </div>
                                                                        <div class="col-md-7 value"> {{ $show->email }} </div>
                                                                    </div>
                                                                    
                                                                      <div class="row static-info">
                                                                        <div class="col-md-5 name"> Phone: </div>
                                                                        <div class="col-md-7 value"> {{ $show->phone }} </div>
                                                                    </div>
                                                                    
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Date: </div>
                                                                        <div class="col-md-7 value"> {{ $show->date }} </div>
                                                                    </div>
                                                                    
                                                                   <div class="row static-info">
                                                                        <div class="col-md-5 name"> Subject: </div>
                                                                        <div class="col-md-7 value"> {{ $show->subject }} </div>
                                                                    </div>


                                                                    
                                                                    
                                                                    <div class="row static-info">
                                                                        
                                                                        <div class="col-md-5 name"> Message content: </div>
                                                                        <div class="col-md-7 value"> {{ $show->message }}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                               </div>
                                            </div>
@endsection