<span class="text-capitalize">
    <ul class="ps-3">
        @foreach (json_decode($model->goods_handling_equipment, true) as $key => $item)
            <li>{{ $item['value'] }}</li>
        @endforeach
    </ul>
</span>