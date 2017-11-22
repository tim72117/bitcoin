
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">一次性密碼 ( One Time Password ) 形式兩階段驗證 ( Two-Factor Authentication ) </div>

            <div class="panel-body">
                <!--
                @if (Auth::user()->google2fa_secret)
                <a href="{{ url('2fa/disable') }}" class="btn btn-warning">Disable 2FA</a>
                @else
                <a href="{{ url('2fa/enable') }}" class="btn btn-primary">Enable 2FA</a>
                @endif
                -->

                <div class="container">
                  <!-- Trigger the modal with a button -->
                @if (Auth::user()->google2fa_secret)
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ResetOTP" id="OTPQR">Reset OTP</button>
                    <!-- Modal -->
                    <div class="modal fade" id="ResetOTP" role="dialog">
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Are you sure to reset?</h4>
                          </div>
                          <div class="modal-body">
                              重設後原本的OTP將失效!
                              <br />
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#myModal" id="OTPQR">Yes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Nope</button>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                @else
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="OTPQR">Enable OTP</button>
                @endif
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog" data-backdrop="false">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Google2FA OTP</h4>
                        </div>
                        <div class="modal-body">
                            Open up your 2FA mobile app and scan the following QR barcode:
                            <br />
                            <div id="qr"></div>
                            <br />
                            If your 2FA mobile app does not support QR barcodes, 
                            enter in the following number: <code id="code"></code>
                            <br />
                        </div>
                        <div class="modal-footer">
                          <button onclick="javascript:window.location.reload()" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-body row">
            <h4 class="normal-color">請參考下方說明來設定OTP：</h4>
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false">
                  <h4 class="panel-title"><i class="fa fa-apple"></i> iPhone 使用者</h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                  <div class="panel-body">
                    <ol>
                      <li>請先至 Apple App Store 下載安裝 <a target="_blank" href="https://itunes.apple.com/tw/app/google-authenticator/id388497605">Google Authenticator App</a>。</li>
                      <li>開啟Google Authenticator APP後，請按上方 + 按鈕來新增一次性密碼，您可選擇掃描條碼(QR Code)或是輸入金鑰(Secret Key)。</li>
                      <li>接著請點擊此畫面上方的 [ Enable OTP ] 的按鈕，來開啟設定畫面，畫面上會顯示出 QR Code 及 Secret Key。</li>
                      <li>使用您的手機鏡頭掃描 QR Code 或者輸入 Secret Key，當您新增成功後，Google Authenticator會每30秒產生一組新的密碼。</li>
                      <li>驗證通過後即完成設定。之後您在登入時，請輸入Google Authenticator所提供的一次性密碼。</li>
                    </ol>
                    <span class="text-danger">注意：</span><br>
                    <span class="text-danger">Google Authenticator App 產生的密碼，每30秒會更新一次，若密碼剛好更換就請輸入最新的密碼。</span>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
                  <h4 class="panel-title"><i class="fa fa-android"></i> Android 使用者</h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
                  <div class="panel-body">
                    <ol>
                      <li>請先至 Google Play Store 下載安裝 <a target="_blank" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2"> Google Authenticator App</a></li>
                      <li>開啟Google Authenticator APP後，請按上方 + 按鈕來新增一次性密碼，您可選擇掃描條碼(QR Code)或是輸入金鑰(Secret Key)。</li>
                      <li>接著請點擊此畫面上方的 [ Enable OTP ] 的按鈕，來開啟設定畫面，畫面上會顯示出 QR Code 及 Secret Key。</li>
                      <li>使用您的手機鏡頭掃描 QR Code 或者輸入 Secret Key，當您新增成功後，Google Authenticator會每30秒產生一組新的密碼。</li>
                      <li>驗證通過後即完成設定。之後您在登入時，請輸入Google Authenticator所提供的一次性密碼。</li>
                    </ol>
                    <span class="text-danger">注意：</span><br>
                    <span class="text-danger">Google Authenticator App 產生的密碼，每30秒會更新一次，若密碼剛好更換就請輸入最新的密碼。</span>
                  </div>
                </div>
              </div>
            </div>
          </div>