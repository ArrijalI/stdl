<div class="max-w-2xl mt-4 mx-auto text-center">
    <h2 class="text-4xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
        <span class="text-transparent select-none bg-clip-text bg-gradient-to-r to-blue-500 from-blue-900 dark:to-purple-300 dark:from-indigo-500">{{ $todayDayName }}</span>
    </h2>    
    <div class="mt-2">
        <div class="inline-flex items-center text-lg font-medium select-none text-primary-600 dark:text-purple-300">
            {{ $todayDate }}
        </div>
    </div>
</div>
<div class="space-y-8 md:space-y-0 md:space-x-8 rtl:space-x-reverse md:flex md:items-center">
    <div class="w-full">
        <dl
            class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-2 xl:grid-cols-2 dark:text-white sm:p-8">
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl font-extrabold"><span class="text-transparent select-none bg-clip-text bg-gradient-to-r to-blue-500 from-blue-900 dark:to-purple-300 dark:from-indigo-500">{{ $countTodayTasks }}</span></dt>
                <dd class="text-primary-600 dark:text-purple-300 font-bold select-none">Tugas Hari Ini</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl font-extrabold"><span class="text-transparent select-none bg-clip-text bg-gradient-to-r to-blue-500 from-blue-900 dark:to-purple-300 dark:from-indigo-500">{{ $countUnfinishedTodayTasks }}</span></dt>
                <dd class="text-primary-600 dark:text-purple-300 font-bold select-none">Belum Dikerjakan</dd>
            </div>
        </dl>
    </div>
</div>
