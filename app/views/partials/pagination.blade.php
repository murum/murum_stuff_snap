<div class="pagination-container">

    <?php
        $presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
    ?>

    @if ($paginator->getLastPage() > 1)
    <span class="hidden-xs">
        <ul class="pagination">
                <li class="{{ ($paginator->getCurrentPage() == 1) ? 'disabled' : '' }}">
                    <a href="{{ $paginator->getUrl(1) }}" class="item{{ ($paginator->getCurrentPage() == 1) ? ' disabled' : '' }}">«</a>
                </li>
                @for ($i = 1; $i <= $paginator->getLastPage(); $i++)
                    <li class="{{ ($paginator->getCurrentPage() == $i) ? 'active' : '' }}">
                        <a href="{{ $paginator->getUrl($i) }}" class="item">{{ $i }}</a>
                    </li>
                @endfor
                <li class="{{ ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' }}">
                    <a href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}" class="item{{ ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' }}">»</a>
                </li>

        </ul>
    </span>

    <span class="visible-xs">
        <ul class="pagination">
            <li class="{{ ($paginator->getCurrentPage() == 1) ? 'disabled' : '' }}">
                <a href="{{ $paginator->getUrl(1) }}" class="item">
                    {{ Lang::get('letssnap.previous') }}
                </a>
            </li>
            <li class="{{ ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' }}">
                <a href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}" class="item">
                    {{ Lang::get('letssnap.next') }}
                </a>
            </li>
        </ul>
    </span>

    @endif
</div>