<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-500">
            {{ $website->url }}?strategy={{ $strategy }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div>

                {!! $chart->container() !!}

                {!! $chart->script() !!}
            </div>

            <hr class="my-4">
            <details
                class="open:bg-white dark:open:bg-slate-900 open:ring-1 open:ring-black/5 dark:open:ring-white/10 open:shadow-lg p-6 rounded-lg"
                close>
                <summary class="leading-6 text-slate-900 dark:text-white font-semibold select-none">
                    瞭解實際使用者體驗
                </summary>
                <div class="leading-6 text-slate-600 dark:text-slate-400 dark:text-white">
                    <div class="px-6 py-4 bg-gray-200 dark:bg-gray-800 my-3">
                        <div class="font-semibold">Largest Contentful Paint (LCP)</div>
                        <div class="">最大内容绘制 (LCP)
                            是测量感知加载速度的一个以用户为中心的重要指标，因为该项指标会在页面的主要内容基本加载完成时，在页面加载时间轴中标记出相应的点，迅捷的 LCP 有助于让用户确信页面是有效的。<a
                                href="https://web.dev/lcp/" class="text-blue-800" target="_blank">瞭解詳情。</a></div>
                    </div>
                    <div class="px-6 py-4 bg-gray-200 dark:bg-gray-800 my-3">
                        <div class="font-semibold">First Input Delay (FID)</div>
                        <div class="">首次输入延迟 (FID) 是测量加载响应度的一个以用户为中心的重要指标，因为该项指标将用户尝试与无响应页面进行交互时的体验进行了量化，低
                            FID有助于让用户确信页面是有效的。<a href="https://web.dev/fid/" class="text-blue-800"
                                target="_blank">瞭解詳情。</a></div>
                    </div>
                    <div class="px-6 py-4 bg-gray-200 dark:bg-gray-800 my-3">
                        <div class="font-semibold">Cumulative Layout Shift (CLS)</div>
                        <div class="">累积布局偏移 (CLS) 是测量视觉稳定性的一个以用户为中心的重要指标，因为该项指标有助于量化用户经历意外布局偏移的频率，较低的
                            CLS有助于确保一个页面是令人愉悦的。<a href="https://web.dev/cls/" class="text-blue-800"
                                target="_blank">瞭解詳情。</a></div>
                    </div>
                    <div class="px-6 py-4 bg-gray-200 dark:bg-gray-800 my-3">
                        <div class="font-semibold">First Contentful Paint (FCP)</div>
                        <div class="">首次内容绘制 (FCP)
                            是测量感知加载速度的一个以用户为中心的重要指标，因为该项指标会在用户首次在屏幕上看到任何内容时，在页面加载时间轴中标记出相应的点，迅捷的 FCP 有助于让用户确信某些事情正在进行。<a
                                href="https://web.dev/fcp/" class="text-blue-800" target="_blank">瞭解詳情。</a></div>
                    </div>
                    <div class="px-6 py-4 bg-gray-200 dark:bg-gray-800 my-3">
                        <div class="font-semibold">Interaction to Next Paint (INP)</div>
                        <div class="">Interaction to Next Paint (INP) is an experimental metric that assesses
                            responsiveness. When an interaction causes a page to become unresponsive, that is a poor
                            user experience. INP observes the latency of all interactions a user has made with the page,
                            and reports a single value which all (or nearly all) interactions were below. A low INP
                            means the page was consistently able to respond quickly to all—or the vast majority—of user
                            interactions.<a href="https://web.dev/inp/" class="text-blue-800" target="_blank">瞭解詳情。</a>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-200 dark:bg-gray-800 my-3">
                        <div class="font-semibold">Time to First Byte (TTFB)</div>
                        <div class="">第一字节时间 (TTFB) 是在实验室和现场测量连接建立时间和 Web 服务器响应能力的一个基础指标。它有助于识别 Web
                            服务器何时对请求的响应速度太慢。对 HTML 文档的请求，该指标先于其他所有的加载性能指标。<a href="https://web.dev/ttfb/"
                                class="text-blue-800" target="_blank">瞭解詳情。</a></div>
                    </div>
                </div>

            </details>
            <livewire:runpagespeed-table :website="$website" :strategy="$strategy">
                <hr class="my-4" />

                <details
                    class="open:bg-white dark:open:bg-slate-900 open:ring-1 open:ring-black/5 dark:open:ring-white/10 open:shadow-lg p-6 rounded-lg"
                    close>
                    <summary class="leading-6 text-slate-900 dark:text-white font-semibold select-none">
                        診斷效能問題
                    </summary>
                    <div class="leading-6 text-slate-600 dark:text-slate-400 dark:text-white">
                        <div class="px-6 py-4 bg-gray-200 dark:bg-gray-800 my-3">
                            <div class="font-semibold">First Contentful Paint</div>
                            <div class="">首次顯示內容所需時間是指瀏覽器首次顯示文字或圖片的時間。<a
                                    href="https://web.dev/first-contentful-paint/?utm_source=lighthouse&utm_medium=lr"
                                    class="text-blue-800" target="_blank">瞭解詳情。</a></div>
                        </div>
                        <div class="px-6 py-4 bg-gray-200 dark:bg-gray-800 my-3">
                            <div class="font-semibold">Time to Interactive</div>
                            <div class="">互動準備時間是網頁進入完整互動狀態前花費的時間。<a
                                    href="https://web.dev/interactive/?utm_source=lighthouse&utm_medium=lr"
                                    class="text-blue-800" target="_blank">瞭解詳情。</a></div>
                        </div>
                        <div class="px-6 py-4 bg-gray-200 dark:bg-gray-800 my-3">
                            <div class="font-semibold">Speed Index</div>
                            <div class="">速度指數會顯示網頁可見內容的填入速度。<a
                                    href="https://web.dev/speed-index/?utm_source=lighthouse&utm_medium=lr"
                                    class="text-blue-800" target="_blank">瞭解詳情。</a></div>
                        </div>
                        <div class="px-6 py-4 bg-gray-200 dark:bg-gray-800 my-3">
                            <div class="font-semibold">Total Blocking Time</div>
                            <div class="">當工作長度超過 50 毫秒時，從 FCP 到互動準備時間的時間範圍總計 (以毫秒為單位)。<a
                                    href="https://web.dev/lighthouse-total-blocking-time/?utm_source=lighthouse&utm_medium=lr"
                                    class="text-blue-800" target="_blank">瞭解詳情。</a></div>
                        </div>
                        <div class="px-6 py-4 bg-gray-200 dark:bg-gray-800 my-3">
                            <div class="font-semibold">Largest Contentful Paint</div>
                            <div class="">「最大內容繪製」是指繪製最大的文字或圖片所需要的時間。<a
                                    href="https://web.dev/lighthouse-largest-contentful-paint/?utm_source=lighthouse&utm_medium=lr"
                                    class="text-blue-800" target="_blank">瞭解詳情。</a></div>
                        </div>
                        <div class="px-6 py-4 bg-gray-200 dark:bg-gray-800 my-3">
                            <div class="font-semibold">Cumulative Layout Shift</div>
                            <div class="">「累計版面配置位移」指標是用於測量可見元素在可視區域內的移動情形。<a
                                    href="https://web.dev/cls/?utm_source=lighthouse&utm_medium=lr"
                                    class="text-blue-800" target="_blank">瞭解詳情。</a></div>
                        </div>
                    </div>

                </details>

                <livewire:experience-table :website="$website" :strategy="$strategy">

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
</x-app-layout>
