<link rel="stylesheet" href="css/popupdangbai.css">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Đăng bài viết
                    </button>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title textmodal" id="exampleModalLabel" style="color:#333">Đăng bài</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {{-- Start Popup --}}
                                {{-- <form id="Mypost" name="Mypost" action="Post" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="modal-body">

                                    
                                        <select class="custom-select mr-sm-2" style="color:blue" id="category"
                                            name="category">
                                            <option selected value="0">Chọn Thể Loại</option>
                                            
                                            @foreach($category as $tl)
                                        
                                                <option value="{{ $tl->id }}">{{ $tl->title }}</option>
                                            
                                            @endforeach
                                        </select>

                                    
                                        <div class="form-group">
                                            <label class="textmodal" style="color:blue">Tiêu đề</label>
                                            <input type="text" class="form-control" id="title" name="title">

                                            <span id="titleloc"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" style="color:blue">Nội dung</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>

                                            <span id="show-error"></span>
                                        </div>

                                    </div> --}}
                                    <!-- ENDPOPUP -->

                                    {{-- thử --}}
                                    <div class="modal-body">
                                        <form id="Mypost" name="Mypost" action="Post" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="row">
                                          <div class="col-25">
                                          <label for="country">Thể Loại</label>
                                          </div>
                                          <div class="col-75">
                                            <select id="category"name="category">
                                            <option selected value="0">Chọn Thể Loại</option>
                                            
                                            @foreach($category as $tl)
                                        
                                                <option value="{{ $tl->id }}">{{ $tl->title }}</option>
                                            
                                            @endforeach
                                        </select>
                                          </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                              <label for="fname">Tiêu đề</label>
                                            </div>
                                            <div class="col-75">
                                              {{-- <input type="text" id="fname" name="firstname" placeholder="Tên của bạn"> --}}
                                              <input type="text" class="form-control" id="title"  placeholder="Tiêu đề" name="title">

                                            <span id="titleloc"></span>
                                            </div>
                                          </div>
                                        <div class="row">
                                          <div class="col-25">
                                            <label for="subject">Nội dung</label>
                                          </div>
                                          <div class="col-75">
                                       {{-- <textarea id="subject" name="subject" placeholder="Viết gì đó..." 
                                            style="height:200px"></textarea> --}}
                                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Viết gì đó..." 
                                            style="height:200px" name="content"></textarea>

                                            <span id="show-error"></span>
                                          </div>
                                        </div>
                                        {{-- <div class="row">
                                            <input type="submit" value="Xác nhận">
                                        </div> --}}
                                        {{-- </form> --}}
                                      </div>
                                    {{-- hết thử --}}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Đóng</button>
                                            <button id="btn-save" type="submit" class="btn btn-primary">Đăng bài</button>
                                        </div>
                                    </form>

                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->