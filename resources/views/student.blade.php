@csrf

<h1> hii </h1>

<ul class="list-group">
                    @foreach($tasks as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
										<td>{{$item->id}}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->phone}}</td>
									
                                    </tr>
								@endforeach
                </ul>