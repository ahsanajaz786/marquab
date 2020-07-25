<div class="people-list" id="people-list"  style="height:300px">
    <div class="search" style="text-align: center">
        <b>Recent Chats</b>
    </div>
    <ul class="list">
        @if(count($threads) > 0)
            @foreach($threads as $inbox)
                @if(!is_null($inbox->thread))
                    <li class="clearfix">
                        <a href="{{route('message.read', ['id'=>$inbox->withUser->id ?? 0])}}">
                            <img src="{{$inbox->withUser->avatar??''}}" alt="avatar" />
                            <div class="about">
                                <div class="name">{{$inbox->withUser->name??''}}</div>
                                <div class="status">
                                    @if(isset($inbox->thread->sender) && auth()->user()->id == $inbox->thread->sender->id)
                                        <span class="fa fa-reply"></span>
                                    @endif
                                    <span>{{substr($inbox->thread->message, 0, 20)}}</span>
                                </div>
                            </div>
                        </a>
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
