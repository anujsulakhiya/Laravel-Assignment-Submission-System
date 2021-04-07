
    <ol class="breadcrumb" style="margin: 0px; border:0px;">
        <li><a class="text-dark" href="/home"><i class="fa fa-home text-dark"></i> Home</a><i
                class="dot fa fa-circle"></i> </li>
        @if (!empty($breadcumb1))
            <?php $segments = ''; ?>
            @foreach (Request::segments() as $segment)
                <?php $segments .= '/' . $segment; ?>
                <li>
                    <a class="text-primary" href="">{{ @$breadcumb }}</a>
                    <i class="dot fa fa-circle"></i>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ @$breadcumb1 }}</li>
            @endforeach

        @else
            <li class="breadcrumb-item active" aria-current="page">{{ @$breadcumb }}</li>
        @endif
    </ol>
