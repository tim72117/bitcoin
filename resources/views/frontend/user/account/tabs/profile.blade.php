<table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.frontend.user.profile.avatar') }}</th>
        <td><img src="{{ $logged_in_user->picture }}" class="user-profile-image" /></td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.name') }}</th>
        <td>{{ $logged_in_user->name }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.email') }}</th>
        <td>{{ $logged_in_user->email }}</td>
    </tr>
    <tr>
        <th>phone</th>
        <td>{{ $logged_in_user->country_code }} {{ $logged_in_user->phone }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.created_at') }}</th>
        <td>{{ $logged_in_user->created_at }} ({{ $logged_in_user->created_at->diffForHumans() }})</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.last_updated') }}</th>
        <td>{{ $logged_in_user->updated_at }} ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
    </tr>
</table>

@if (!$logged_in_user->phone_confirmed)
<div class="container">
  <!-- Trigger the modal with a button -->
  @if (count($logged_in_user->tokens) > 0)
      <a href="{{ route('frontend.user.sendphonecode') }}" type="button" class="btn btn-warning" id="Resendverifi">Resend verification code</a>
     @else
      <a href="{{ route('frontend.user.sendphonecode') }}" type="button" class="btn btn-primary" id="Sendverifi">Send verification code</a>
  @endif
  @if (count($logged_in_user->tokens) > 0)
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#phoneModal" id="PhoneModal">Phone Comfirm</button>
    
      <!-- Modal -->
      <div class="modal fade" id="phoneModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Digits sent, please comfirm.</h4>
            </div>
            <div class="modal-body">
                    {{ Form::open(['route' => ['frontend.user.confirmphone'], 'class' => 'form-horizontal', 'method' => 'POST']) }}
                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">Six digits code</label>
    
                            <div class="col-md-6">
                                <input id="token" type="text" class="form-control" name="token" required autofocus>
                                
                                @if ($errors->has('code'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                {{ Form::submit("Comfirm", ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
  @endif
</div>
@endif