

<?php $__env->startSection('title', 'User Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-8 animate-in fade-in duration-700">
        <!-- Top Stats (Bento Grid Style) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- AI Replies -->
            <div class="relative group">
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-3xl blur opacity-10 group-hover:opacity-20 transition duration-500">
                </div>
                <div
                    class="relative bg-white dark:bg-slate-900/50 p-6 rounded-3xl border border-gray-100 dark:border-white/5 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 rounded-2xl bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-green-500 bg-green-500/10 px-2 py-1 rounded-lg">+12.5%</span>
                    </div>
                    <h4 class="text-3xl font-black mb-1">1,284</h4>
                    <p class="text-sm text-gray-500" x-text="rtl ? 'إجمالي الردود الذكية' : 'Total AI Replies'"></p>
                </div>
            </div>

            <!-- Sentiment Score -->
            <div class="relative group">
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-pink-500 to-rose-600 rounded-3xl blur opacity-10 group-hover:opacity-20 transition duration-500">
                </div>
                <div
                    class="relative bg-white dark:bg-slate-900/50 p-6 rounded-3xl border border-gray-100 dark:border-white/5 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 rounded-2xl bg-pink-50 dark:bg-pink-900/30 text-pink-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-pink-500 bg-pink-500/10 px-2 py-1 rounded-lg"
                            x-text="rtl ? 'ممتاز' : 'Premium'"></span>
                    </div>
                    <h4 class="text-3xl font-black mb-1">94%</h4>
                    <p class="text-sm text-gray-500" x-text="rtl ? 'معدل الرضا العام' : 'Positive Sentiment'"></p>
                </div>
            </div>

            <!-- Protected Comments -->
            <div class="relative group">
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-amber-500 to-orange-600 rounded-3xl blur opacity-10 group-hover:opacity-20 transition duration-500">
                </div>
                <div
                    class="relative bg-white dark:bg-slate-900/50 p-6 rounded-3xl border border-gray-100 dark:border-white/5 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 rounded-2xl bg-amber-50 dark:bg-amber-900/30 text-amber-600 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-3xl font-black mb-1">142</h4>
                    <p class="text-sm text-gray-500" x-text="rtl ? 'تعليقات محمية' : 'Protected Comments'"></p>
                </div>
            </div>

            <!-- Linked Accounts -->
            <div class="relative group">
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-3xl blur opacity-10 group-hover:opacity-20 transition duration-500">
                </div>
                <div
                    class="relative bg-white dark:bg-slate-900/50 p-6 rounded-3xl border border-gray-100 dark:border-white/5 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-blue-900/30 text-blue-600 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-3xl font-black mb-1">04</h4>
                    <p class="text-sm text-gray-500" x-text="rtl ? 'حسابات متصلة' : 'Active Pages'"></p>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Quick Onboarding / Logic Flow -->
            <div class="lg:col-span-2 space-y-6">
                <div
                    class="relative group overflow-hidden bg-white dark:bg-slate-900/50 p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5">
                    <div class="absolute top-0 right-0 p-8 opacity-5">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-black mb-6"
                        x-text="rtl ? 'ابدأ العمل في 3 خطوات' : 'Start working in 3 steps'"></h3>

                    <div class="space-y-4">
                        <div
                            class="flex items-center gap-6 p-4 rounded-2xl hover:bg-white/5 transition-all border border-transparent hover:border-white/5 group">
                            <div
                                class="w-10 h-10 rounded-xl bg-indigo-500 text-white flex items-center justify-center font-bold text-lg shadow-lg shadow-indigo-500/20 flex-shrink-0">
                                1</div>
                            <div>
                                <h5 class="font-bold mb-1" x-text="rtl ? 'ربط الحسابات' : 'Connect Accounts'"></h5>
                                <p class="text-sm text-gray-500"
                                    x-text="rtl ? 'قم بإضافة Access Token الخاص بصفحاتك' : 'Add your Facebook/Instagram Page Tokens'">
                                </p>
                            </div>
                            <a href="#"
                                class="ml-auto p-2 bg-white/5 rounded-lg opacity-0 group-hover:opacity-100 transition-all">
                                <svg class="w-5 h-5 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>

                        <div
                            class="flex items-center gap-6 p-4 rounded-2xl hover:bg-white/5 transition-all border border-transparent hover:border-white/5 group">
                            <div
                                class="w-10 h-10 rounded-xl bg-gray-200 dark:bg-slate-800 text-gray-500 flex items-center justify-center font-bold text-lg flex-shrink-0">
                                2</div>
                            <div>
                                <h5 class="font-bold mb-1" x-text="rtl ? 'تغذية الذكاء الاصطناعي' : 'Train the AI'"></h5>
                                <p class="text-sm text-gray-500"
                                    x-text="rtl ? 'أخبر البوت عن طبيعة عملك وردودك المفضلة' : 'Provide context about your business'">
                                </p>
                            </div>
                        </div>

                        <div
                            class="flex items-center gap-6 p-4 rounded-2xl hover:bg-white/5 transition-all border border-transparent hover:border-white/5 group">
                            <div
                                class="w-10 h-10 rounded-xl bg-gray-200 dark:bg-slate-800 text-gray-500 flex items-center justify-center font-bold text-lg flex-shrink-0">
                                3</div>
                            <div>
                                <h5 class="font-bold mb-1" x-text="rtl ? 'تفعيل الأتمتة' : 'Activate Automation'"></h5>
                                <p class="text-sm text-gray-500"
                                    x-text="rtl ? 'شغل البوت واتركه يقوم بالعمل الشاق' : 'Enable comment and message replies'">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar List: Recent Activity -->
            <div class="space-y-6">
                <div
                    class="bg-white dark:bg-slate-900/50 p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 h-full">
                    <h3 class="text-xl font-black mb-8" x-text="rtl ? 'آخر النشاطات' : 'Recent Activity'"></h3>
                    <div class="space-y-8">
                        <template x-for="i in 4" :key="i">
                            <div class="flex gap-4 relative">
                                <div
                                    class="absolute top-8 bottom-0 left-[11px] rtl:right-[11px] rtl:left-auto w-0.5 bg-white/5">
                                </div>
                                <div :class="i == 1 ? 'bg-indigo-500 ring-4 ring-indigo-500/20' : 'bg-gray-200 dark:bg-slate-800'"
                                    class="w-6 h-6 rounded-full flex-shrink-0 z-10 transition-all duration-700"></div>
                                <div class="pb-2">
                                    <p class="text-xs font-bold mb-1"
                                        x-text="rtl ? 'تم الرد على تعليق جديد' : 'Replied to a comment'"></p>
                                    <p class="text-[10px] text-gray-500" x-text="rtl ? 'منذ دقيقة واحدة' : '1 minute ago'">
                                    </p>
                                </div>
                            </div>
                        </template>
                    </div>
                    <button
                        class="w-full mt-10 py-3 rounded-xl border border-white/5 text-xs font-bold hover:bg-white/5 transition-all"
                        x-text="rtl ? 'شاهد كل السجلات' : 'View Full Logs'"></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Marketation\Desktop\airespondsass\resources\views/user/dashboard.blade.php ENDPATH**/ ?>