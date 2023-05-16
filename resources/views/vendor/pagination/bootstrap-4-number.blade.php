<h4 class="mb-0">
    最新の投稿
    @if ($paginator->total() === 0)
    0件
    @else
        @if ($paginator->hasPages())
            @if ($paginator->firstItem() === $paginator->lastItem())
            {{ $paginator->firstItem() }}件目
            @else
            {{ $paginator->firstItem() }}～{{ $paginator->lastItem() }}件目
            @endif
        @else
        {{ $paginator->total() }}件
        @endif
    @endif
</h4>