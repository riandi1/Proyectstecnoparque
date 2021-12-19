<div class="container mx-auto p-10">
    <table wire:loading.delay.class="opacity-50" class="table-auto w-full">
        <tbody>
            @forelse ($users as $user)
                <tr @if ($loop->last) id="last_record" @endif>
                    <td class="border px-4 py-2">{{$user->name}}</td>
                    <td class="border px-4 py-2">{{$user->email}}</td>
                    
                </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>

    @if ($loadAmount >= $totalRecords)
        <p class="text-gray-700 font-bold text-2xl text-center my-10">NO hay datos</p>
    @endif

    <script>
        const lastRecord = document.getElementById('last_record')
        const options = {
            root: null,
            threshold: 1,
            rootMargin: '0px'
        }

        const observer = new IntersectionObserver((entries,observer)=>{
            entries.forEach(entry=>{
                if (entry.isIntersecting) {
                    @this.loadMore()
                }
            })
        })

        observer.observe(lastRecord)
    </script>
</div>
