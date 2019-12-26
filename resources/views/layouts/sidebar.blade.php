<div class="yaybar yay-hide-to-small yay-shrink yay-gestures rui-yaybar">
    <div class="yay-wrap-menu">
        <div class="yaybar-wrap">
            <ul>
                @foreach(config('navigation') as $nav)
                <li>
                    <a href="{{ $nav['url'] }}" class="{{ isset($nav['items']) ? 'yay-sub-toggle' : '' }}">
                        <span class="yay-icon"><span data-feather="{{ $nav['icon'] }}" class="rui-icon rui-icon-stroke-1_5"></span></span>
                        <span>{{ $nav['name'] }}</span>
                        <span class="rui-yaybar-circle"></span>
                      </a>
                     @if(isset($nav['items']))

                    <ul class="yay-submenu dropdown-triangle">
                        @foreach($nav['items'] as $subNav)
                        <li>
                          <a href="{{ $subNav['url'] }}">
                            {{ $subNav['name'] }}
                          </a>
                        </li>

                        @endforeach
                        </ul>
                    @endif

                </li>
                @endforeach
                </ul>
            </div>
        </div>

    </div>
    <div class="rui-yaybar-bg"></div>
