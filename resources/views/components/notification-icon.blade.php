@php
    $notifications = Auth::user()->notifications()->get();
    $unreadNotifications = Auth::user()->unreadNotifications()->get();
@endphp
<div class="relative mr-5">
    <button id="notification-button" class="p-2 text-white hover:cursor-pointer hover:text-orange-500 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
      <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-s font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-orange-600 rounded-full">{{ $unreadNotifications->count() }}</span>
    </button>
  
    <div id="notification-menu" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg z-10 border border-gray-200">
      <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="notification-button">
        <div class="flex justify-between items-center px-4 py-2 text-sm text-gray-700 border-b">
          <p>Notifications</p>
          <button class="text-sm text-gray-700 hover:text-gray-900 hover:cursor-pointer" onclick= markAllAsRead()>Mark all as read</button>
        </div>
        @foreach ($notifications as $notification)
            <a href="{{ route('posts.show', $notification->data['id'])  }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">
                {{ $notification->data['message'] }}
            </a>
        @endforeach
      </div>
    </div>
  </div>
  <script>
    const deleteNotificationUrl = "{{ route('notifications.destroy', ':id')  }}"

    async function markAllAsRead() {  
      const notifications = @json($notifications);
      
      // Mark all notifications as read in parallel
      const promises = notifications.map(notification => markAsRead(notification));
      
      try {
        await Promise.all(promises);
        // Reload the page asynchronously after all notifications are marked as read
        window.location.reload();
      } catch (error) {
        console.error('Error marking notifications as read:', error);
      }
    }

    async function markAsRead(notification) {
      const url = deleteNotificationUrl.replace(':id', notification['id']);
      
      try {
        const response = await fetch(url, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json',
          },
        });

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const responseData = await response.json();
        console.log('Success:', responseData);
        return responseData;

      } catch (error) {
        console.error('Error:', error);
        throw error;
      }
    }
  </script>
  