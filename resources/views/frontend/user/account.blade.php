@extends('frontend.layouts.app')

@section('content')
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('navs.frontend.user.account') }}</div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('navs.frontend.user.profile') }}</a>
                            </li>

                            @if (!$logged_in_user->phone_confirmed)
                                <li role="presentation">
                                    <a href="#edit" aria-controls="edit" role="tab" data-toggle="tab">{{ trans('labels.frontend.user.profile.update_information') }}</a>
                                </li>
                            @endif

                            <li role="presentation">
                                <a href="#google2fa" aria-controls="google2fa" role="tab" data-toggle="tab">Google-OTP-2FA</a>
                            </li>

                            @if ($logged_in_user->canChangePassword())
                                <li role="presentation">
                                    <a href="#password" aria-controls="password" role="tab" data-toggle="tab">{{ trans('navs.frontend.user.change_password') }}</a>
                                </li>
                            @endif
                        </ul>

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane mt-30 active" id="profile">
                                @include('frontend.user.account.tabs.profile')
                            </div><!--tab panel profile-->

                            @if (!$logged_in_user->phone_confirmed)
                                <div role="tabpanel" class="tab-pane mt-30" id="edit">
                                    @include('frontend.user.account.tabs.edit')
                                </div><!--tab panel profile-->
                            @endif
                            
                            <div role="tabpanel" class="tab-pane mt-30" id="google2fa">
                                @include('frontend.user.account.tabs.google2fa')
                            </div><!--tab panel profile-->

                            @if ($logged_in_user->canChangePassword())
                                <div role="tabpanel" class="tab-pane mt-30" id="password">
                                    @include('frontend.user.account.tabs.change-password')
                                </div><!--tab panel change password-->
                            @endif
                            

                        </div><!--tab content-->

                    </div><!--tab panel-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-xs-12 -->
        
    </div><!-- row -->
@endsection