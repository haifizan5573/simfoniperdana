        <!-- <div class="card text-center">
                                    <div class="card-body @if($active==1) bg-primary bg-soft @endif"> -->
                                    <div class="card  p-2 mb-2 @if($active==1) bg-primary bg-soft @endif">
                                        {!!$image!!}
                                 
                                        {!!$content!!}
                                        <!-- <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Frank Kirk</a></h5>
                                        <p class="text-muted">Frontend Developer</p>

                                        <div>
                                            <a href="#" class="badge bg-primary font-size-11 m-1">Html</a>
                                            <a href="#" class="badge bg-primary font-size-11 m-1">Css</a>
                                            <a href="#" class="badge bg-primary font-size-11 m-1">2 + more</a>
                                        </div> -->
                                    <!-- </div> -->
                                    @if(isset($footer))
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a href=""><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href=""><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href=""><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
        <!-- </div> -->