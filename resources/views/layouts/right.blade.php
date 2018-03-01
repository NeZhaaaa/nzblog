<div class="col-lg-4 hidden-xs hidden-sm hidden-md">
        <div class="panel panel-default r-dv-readme">
            <div class="panel-heading">
                <h3 class="panel-title">哪吒的博客</h3>
            </div>
            <div class="panel-body">
                <div class="media">
                    <div class="media-left">
                        <div class="thumbnail">
                            <img class="media-object" src="__HOME_IMAGE__/wechat_code.jpg" alt="...">
                        </div>
                    </div>
                    <div class="media-body">
                        <!-- <h4 class="media-heading">哪吒的博客</h4> -->
                        <br>
                        <p>闻道有先后，术业有专攻。</p>
                        <p>莫说真理无穷，进一步有进一步的欢喜。</p>
                        <p>共勉。</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default r-dv-tag">
            <div class="panel-heading">
                <h3 class="panel-title">文章标签</h3>
            </div>
            <div class="panel-body">
                @php
                    $lables = ['label-primary', 'label-success', 'label-info', 'label-danger']
                @endphp
                @foreach ($tags as $tag)
                @php
                    $label_class = array_random($lables);
                @endphp
                    <a href="/tag/{{ $tag->name }}" style="display:inline-block;margin-bottom:10px;">
                        <span class="label {{ $label_class }}">{{ $tag->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="panel panel-default r-dv-recommend">
            <div class="panel-heading">
                <h3 class="panel-title">专题文章</h3>
            </div>
            <div class="panel-body">
                    <ul class="r-dv-list">
                        @foreach ($subjects as $subject)
                        <li><a href="/subject/{{ $subject->id }}">{{ $subject->name }}</a></li>
                        @endforeach
                    </ul>
            </div>
        </div>
        <div class="panel panel-default r-dv-date">
            <div class="panel-heading">
                <h3 class="panel-title">时间归档</h3>
            </div>
            <div class="panel-body">
                <ul class="r-dv-list">
                    @foreach ($archives as $archive)
                        
                    <li><a href="/archive?year={{ $archive['year'] }}&month={{ $archive['month']}}">{{ $archive['year'] }}年{{ $archive['month'] }}日&nbsp({{ $archive['count'] }})</a></li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>