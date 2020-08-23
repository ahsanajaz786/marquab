<div class="people-list" id="people-list"  style="200px">
    <div class="search" style="text-align: center">
      <div class="row col">  <b>All Conversations </b> <a href="" style="color:#ddd;margin-left:2%">Unread</a>
      </div>
    </div>
   
  <div class="panel panel-primary">
  <div class="panel-body" style="min-height:490px ;overflow-y: scroll;">
    <ul class="list">
        @if(count($threads) > 0)
            @foreach($threads as $inbox)
           
                @if(!is_null($inbox->thread))
                    <li class="clearfix">
                        <a href="{{route('message.read', ['id'=>$inbox->withUser->id ?? 0])}}">
                            <img src="{{$inbox->withUser->avatar??''}}" alt="avatar" />
                         </a>
                            <div class="about">
                            <a href="{{route('message.read', ['id'=>$inbox->withUser->id ?? 0])}}">
                        
                                <span class="name">{{$inbox->withUser->name??''}}</span>
                             </a>
                                <span class="pull-right" style="color:#ddd">{{substr($inbox->thread->humans_time, 0, 20)}}</span>
                                
                                <div class="status mt-2">
                                    <span>{{substr($inbox->thread->message, 0, 20)}}</span>
                                    
                                <!--    <span class="pull-right">{{substr($inbox->thread->is_seen, 0, 20)}}
                                    <img src="{{asset('images/google.svg')}}" style="width:35px" /> Sign Up with Google
                          --->
                                </span>
                                </div>
                            </div>
                       
                    </li>
                @endif
            @endforeach
        @else
            <li class="text-center">
                <span>No Recent Conversation Found</span>
            </li>
        @endif

    </ul>
</div>
</div>
  </div>
