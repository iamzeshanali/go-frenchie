<ul class="tags-list">
        @if(!empty($blue))

            @foreach($blue as $b)
                <li>Blue  <small>{{$b}}</small> <span aria-hidden="true" title="close" onclick="cancelRecentSearch('Blue', '{{$b}}')">&times;</span></li>
            @endforeach
        @endif
        @if(!empty($chocolate))

            @foreach($chocolate as $c)
                <li>Chocolate  <small>{{$c}}</small> <span aria-hidden="true" title="close" onclick="cancelRecentSearch('Chocolate', '{{$c}}')">&times;</span></li>
            @endforeach
        @endif
        @if(!empty($testable))

            @foreach($testable as $t)
                <li>Testable  <small>{{$t}}</small> <span aria-hidden="true" title="close" onclick="cancelRecentSearch('Testable', '{{$t}}')">&times;</span></li>
            @endforeach
        @endif
        @if(!empty($fluffy))

            @foreach($fluffy as $f)
                <li>Fluffy  <small>{{$f}}</small> <span aria-hidden="true" title="close" onclick="cancelRecentSearch('Fluffy', '{{$f}}')">&times;</span></li>
            @endforeach
        @endif
        @if(!empty($intensity))

            @foreach($intensity as $i)
                <li>Intensity  <small>{{$i}}</small> <span aria-hidden="true" title="close" onclick="cancelRecentSearch('Intensity', '{{$i}}')">&times;</span></li>
            @endforeach
        @endif
        @if(!empty($pied))

            @foreach($pied as $p)
                <li>Pied  <small>{{$p}}</small> <span aria-hidden="true" title="close" onclick="cancelRecentSearch('Pied', '{{$p}}')">&times;</span></li>
            @endforeach
        @endif
        @if(!empty($merle))

            @foreach($merle as $m)
                <li>Merle  <small>{{$m}}</small> <span aria-hidden="true" title="close" onclick="cancelRecentSearch('Merle', '{{$m}}')">&times;</span></li>
            @endforeach
        @endif
        @if(!empty($brindle))

            @foreach($brindle as $br)
                <li>Brindle  <small>{{$br}}</small> <span aria-hidden="true" title="close" onclick="cancelRecentSearch('Blue', '{{$br}}')">&times;</span></li>
            @endforeach
        @endif

</ul>


