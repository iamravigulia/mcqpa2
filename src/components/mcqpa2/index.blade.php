<style>
    table {
        background: #fff;
        width: 94%;
        border: 0;
    }
    th {
        text-align: left;
        padding: 5px;
        background: rgb(218, 218, 218);
    }
    td {
        border: 1px solid rgb(218, 218, 218);
        padding: 0 5px;
    }
    tr:nth-child(odd) {
        background: rgb(243, 242, 242);
    }
</style>
<table>
    <thead>
        <th>#</th>
        <th>Question</th>
        <th>Answers</th>
        {{-- <th>Level</th>
        <th>Score</th> --}}
        <th>Created/Updated</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @php
        $fmt_mof_ques = DB::table('fmt_mcqpa2_ques')->get();
        @endphp
        @foreach ($fmt_mof_ques as $que)
        <tr>
            <td>{{$que->id}}</td>
            <td>
                <div>{{$que->question}}</div>
                <div>
                    @php $media = DB::table('media')->where('id', $que->media_id)->first() @endphp
                    @if($media)
                    <audio controls="controls" src="{{url('/')}}/storage/{{$media->url}}"></audio>
                    @endif
                </div>
            </td>
            @php $fmt_mof_ans = DB::table('fmt_mcqpa2_ans')->where('question_id', $que->id)->get() @endphp
            <td>
                <ul>
                    @foreach ($fmt_mof_ans as $ans)
                    <li style=" @if($ans->arrange == 1) color:blue; border:1px solid #1069bb; padding:2px; margin:4px 0; border-radius:4px; @else border:1px solid #707070; padding:2px; margin:4px 0; border-radius:4px; @endif" >
                        <span>{{$ans->answer}}</span>
                        <div>
                            @php $image = DB::table('media')->where('id', $ans->media_id)->first() @endphp
                            @if($image)
                            <img src="{{url('/')}}/storage/{{$image->url}}" style="width:40px; height:30px; object-fit:cover;"></li>
                            @endif
                        </div>
                    </li>
                    @endforeach
                </ul>
            </td>
            {{-- <td>{{$que->level_id}}</td>
            <td>{{$que->score}}</td> --}}
            <td>
                <div style="font-size:12px;">
                    <span>Created: </span>
                    {{date('d-n-Y g:i a',strtotime($que->created_at))}}
                </div>
                <div style="font-size:12px;">
                    <span>Updated: </span>
                    {{date('d-n-Y g:i a',strtotime($que->updated_at))}}
                </div>
            </td>
            <td>
                <a style="font-size: 12px; background:#4450f3; color:#fff; border-radius:4px; padding:2px 4px;" href="javascript:void(0);"  onclick="modalMCQPA2({{$que->id}})">Edit</a>
                <a style="font-size: 12px; background:#f23939; color:#fff; border-radius:4px; padding:2px 4px;" href="{{route('fmt.mcqpa2.delete', $que->id)}}">Delete</a>
            </td>
        </tr>
        <x-mcqpa2.edit :message="$que->id"/>
        @endforeach
    </tbody>
</table>
<script>
    function modalMCQPA2($id){
        var modal = document.getElementById('modalMCQPA2'+$id);
        modal.classList.remove("hidden");
    }
    function closemodalMCQPA2($id){
        var modal = document.getElementById('modalMCQPA2'+$id);
        modal.classList.add("hidden");
    }
</script>