

<?php $__env->startSection('title', 'Unified Inbox'); ?>

<?php $__env->startSection('content'); ?>
    <div class="h-[calc(100vh-10rem)] -m-8 flex overflow-hidden animate-in fade-in duration-700" x-data="{ syncModal: false, syncing: false, syncProgress: 0, platform: 'both', limit: 50 }">
        <!-- Conversations Sidebar -->
        <div class="w-80 lg:w-96 flex-shrink-0 border-r dark:border-white/5 bg-white dark:bg-slate-900/30 flex flex-col">
            <div class="p-6 border-b dark:border-white/5 space-y-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-black" x-text="rtl ? 'الرسائل والمحادثات' : 'Conversations'"></h2>
                    <button @click="syncModal = true" class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-[10px] font-black uppercase tracking-wider hover:scale-105 transition-all shadow-lg shadow-indigo-600/20 flex items-center gap-2">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                        <span x-text="rtl ? 'سحب' : 'Sync'"></span>
                    </button>
                </div>
                <div class="relative">
                    <input type="text" :placeholder="rtl ? 'بحث في المحادثات...' : 'Search messages...'"
                        class="w-full h-11 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-indigo-500/30 rounded-xl px-10 text-sm outline-none transition-all dark:text-white">
                    <svg class="w-4 h-4 absolute left-4 top-3.5 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

            <!-- Conversations List -->
            <div class="flex-grow overflow-y-auto">
                <template x-for="i in 5" :key="i">
                    <div class="p-4 border-b dark:border-white/5 hover:bg-indigo-500/5 cursor-pointer transition-all group relative active:bg-indigo-500/10"
                        :class="i == 1 ? 'bg-indigo-500/5 border-l-4 border-l-indigo-500 rtl:border-l-0 rtl:border-r-4 rtl:border-r-indigo-500' : ''">
                        <div class="flex gap-4">
                            <div class="relative flex-shrink-0">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-gray-200 to-gray-300 dark:from-slate-700 dark:to-slate-800 flex items-center justify-center font-bold">
                                    JD</div>
                                <div
                                    class="absolute -bottom-1 -right-1 w-5 h-5 rounded-full border-2 border-white dark:border-slate-900 bg-blue-600 flex items-center justify-center">
                                    <svg x-show="i % 2 == 0" class="w-3 h-3 text-white" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                    <svg x-show="i % 2 != 0" class="w-3 h-3 text-white" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-grow overflow-hidden">
                                <div class="flex justify-between items-center mb-1">
                                    <h4 class="font-bold text-sm truncate">John Doe</h4>
                                    <span class="text-[10px] text-gray-400">12:45 PM</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <p class="text-xs text-gray-500 truncate"
                                        x-text="rtl ? 'كم سعر الشنطة؟ من فضلك رد سريعاً' : 'How much for the bag? Please reply fast.'">
                                    </p>
                                    <span class="flex-shrink-0 w-2 h-2 rounded-full bg-indigo-500" x-show="i == 1"></span>
                                </div>
                                <div class="flex items-center gap-2 mt-2">
                                    <span
                                        class="text-[9px] font-black px-1.5 py-0.5 rounded bg-indigo-500/10 text-indigo-500 uppercase tracking-tighter"
                                        x-text="rtl ? 'استفسار عن سعر' : 'Price Inquiry'"></span>
                                    <span
                                        class="text-[9px] font-black px-1.5 py-0.5 rounded bg-green-500/10 text-green-500">😊</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Active Chat Window -->
        <div class="flex-grow flex flex-col bg-gray-50/50 dark:bg-slate-900/10">
            <!-- Chat Header -->
            <div
                class="h-20 border-b dark:border-white/5 bg-white/80 dark:bg-slate-900/50 backdrop-blur px-8 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div
                        class="w-10 h-10 rounded-xl bg-gray-200 dark:bg-slate-800 flex items-center justify-center font-bold">
                        JD</div>
                    <div>
                        <h3 class="font-bold text-sm">John Doe</h3>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span>
                            <span class="text-[10px] text-gray-500" x-text="rtl ? 'نشط الآن' : 'Active Now'"></span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <button
                        class="px-4 py-2 border dark:border-white/5 rounded-xl text-xs font-bold hover:bg-white/5 transition-all text-pink-500 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span x-text="rtl ? 'إيقاف البوت' : 'Pause Bot'"></span>
                    </button>
                </div>
            </div>

            <!-- Messages Area -->
            <div class="flex-grow overflow-y-auto p-8 space-y-6">
                <!-- Received -->
                <div class="flex gap-4 max-w-lg">
                    <div
                        class="w-8 h-8 rounded-lg bg-gray-200 dark:bg-slate-800 flex-shrink-0 flex items-center justify-center text-[10px] font-bold">
                        JD</div>
                    <div class="bg-white dark:bg-slate-800 p-4 rounded-2xl rounded-tl-none shadow-sm text-sm"
                        x-text="rtl ? 'أريد معرفة سعر الشنطة السوداء وهل يوجد توصيل؟' : 'I want to know the price of the black bag, do you deliver?'">
                    </div>
                </div>

                <!-- Bot Reply -->
                <div class="flex flex-row-reverse gap-4 max-w-lg ml-auto">
                    <div
                        class="w-8 h-8 rounded-lg bg-indigo-600 text-white flex-shrink-0 flex items-center justify-center text-[10px] font-bold">
                        AI</div>
                    <div
                        class="bg-indigo-600 p-4 rounded-2xl rounded-tr-none shadow-lg shadow-indigo-600/20 text-sm text-white relative">
                        <span
                            x-text="rtl ? 'أهلاً بك يا جون! سعر الشنطة السوداء 250 ريال، والتوصيل متاح لكل مناطق المملكة.' : 'Hi John! The black bag is $250, and we deliver everywhere.'"></span>
                        <div class="absolute -bottom-5 right-0 text-[9px] text-indigo-500 font-black uppercase tracking-widest"
                            x-text="rtl ? 'رد آلي' : 'AI Reply'"></div>
                    </div>
                </div>
            </div>

            <!-- Chat Input -->
            <div class="p-8">
                <div
                    class="bg-white dark:bg-slate-900 border dark:border-white/5 p-2 rounded-[2rem] flex items-center gap-2 shadow-2xl transition-all focus-within:ring-2 focus-within:ring-indigo-500/20">
                    <button class="p-3 text-gray-400 hover:text-indigo-500"><svg class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg></button>
                    <input type="text"
                        :placeholder="rtl ? 'اكتب رسالتك وتدخل يدوياً...' : 'Type a message to takeover y manually...'"
                        class="flex-grow bg-transparent outline-none px-2 text-sm">
                    <button
                        class="p-3 w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center shadow-lg shadow-indigo-600/30 hover:scale-105 transition-all">
                        <svg class="w-5 h-5 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9-7-9-7v14z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- AI Insights Panel (Right Sidebar) -->
        <div
            class="w-72 flex-shrink-0 border-l dark:border-white/5 bg-white dark:bg-slate-900/30 p-8 space-y-8 hidden xl:block overflow-y-auto">
            <div>
                <h3 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-4"
                    x-text="rtl ? 'تحليل المشاعر' : 'Sentiment Analysis'"></h3>
                <div class="bg-green-500/10 p-4 rounded-2xl flex items-center justify-between">
                    <span class="text-xs font-bold text-green-500" x-text="rtl ? 'إيجابي جداً' : 'Very Positive'"></span>
                    <span class="text-lg">😊</span>
                </div>
            </div>

            <div>
                <h3 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-4"
                    x-text="rtl ? 'نية العميل' : 'User Intent'"></h3>
                <div class="space-y-2">
                    <div
                        class="px-4 py-2 rounded-xl bg-indigo-500/10 text-indigo-500 text-xs font-bold border border-indigo-500/20 flex items-center justify-between">
                        <span x-text="rtl ? 'استفسار تجاري' : 'Business Inquiry'"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-4"
                    x-text="rtl ? 'ملخص المحادثة' : 'AI Summary'"></h3>
                <p class="text-xs text-gray-500 leading-relaxed"
                    x-text="rtl ? 'العميل مهتم بشراء الشنطة السوداء ويسأل عن طرق التوصيل وكيفية الدفع.' : 'Customer is interested in the black bag, asking for delivery options and payment.'">
                </p>
            </div>

            <div class="pt-8 border-t dark:border-white/5">
                <button
                    class="w-full py-4 rounded-2xl bg-pink-500/5 text-pink-500 font-bold text-[10px] border border-pink-500/10 uppercase tracking-widest hover:bg-pink-500/10 transition-all flex items-center justify-center gap-2">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span x-text="rtl ? 'تحويلة للمشرف' : 'Handover to Supervisor'"></span>
                </button>
            </div>
        </div>

        <!-- Sync Conversations Modal -->
        <div x-show="syncModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click.self="syncModal = false">
            <div x-show="syncModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="bg-white dark:bg-slate-900 rounded-[3rem] p-10 max-w-lg w-full shadow-2xl border border-gray-100 dark:border-white/5 space-y-8">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-black" x-text="rtl ? 'سحب المحادثات' : 'Sync Conversations'"></h3>
                    <button @click="syncModal = false" class="w-10 h-10 rounded-xl hover:bg-gray-100 dark:hover:bg-slate-800 flex items-center justify-center transition-all">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <div class="space-y-6" x-show="!syncing">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2" x-text="rtl ? 'اختر المنصة' : 'Select Platform'"></label>
                        <div class="grid grid-cols-3 gap-3">
                            <button @click="platform = 'facebook'" :class="platform === 'facebook' ? 'bg-blue-600 text-white' : 'bg-gray-100 dark:bg-slate-800 text-gray-600 dark:text-gray-300'" class="p-4 rounded-2xl font-bold text-sm transition-all hover:scale-105 flex flex-col items-center gap-2">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" /></svg>
                                <span class="text-[10px]">Facebook</span>
                            </button>
                            <button @click="platform = 'instagram'" :class="platform === 'instagram' ? 'bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 text-white' : 'bg-gray-100 dark:bg-slate-800 text-gray-600 dark:text-gray-300'" class="p-4 rounded-2xl font-bold text-sm transition-all hover:scale-105 flex flex-col items-center gap-2">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.981 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" /></svg>
                                <span class="text-[10px]">Instagram</span>
                            </button>
                            <button @click="platform = 'both'" :class="platform === 'both' ? 'bg-indigo-600 text-white' : 'bg-gray-100 dark:bg-slate-800 text-gray-600 dark:text-gray-300'" class="p-4 rounded-2xl font-bold text-sm transition-all hover:scale-105 flex flex-col items-center gap-2">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                                <span class="text-[10px]" x-text="rtl ? 'الكل' : 'Both'"></span>
                            </button>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2" x-text="rtl ? 'عدد الرسائل المطلوب سحبها' : 'Message Limit'"></label>
                        <input type="number" x-model="limit" min="10" max="500" class="w-full h-14 bg-gray-50 dark:bg-slate-800 border-2 border-transparent focus:border-indigo-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all text-center font-bold text-lg">
                        <p class="text-[10px] text-gray-500 px-2" x-text="rtl ? 'الحد الأقصى: 500 رسالة' : 'Maximum: 500 messages'"></p>
                    </div>

                    <button @click="syncing = true; syncProgress = 0; let interval = setInterval(() => { syncProgress += 10; if(syncProgress >= 100) { clearInterval(interval); setTimeout(() => { syncing = false; syncModal = false; syncProgress = 0; }, 500); } }, 300)" class="w-full py-5 bg-indigo-600 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/30 hover:scale-105 transition-all flex items-center justify-center gap-3">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                        <span x-text="rtl ? 'بدء الاستخراج' : 'Start Extraction'"></span>
                    </button>
                </div>

                <div class="space-y-6" x-show="syncing">
                    <div class="text-center space-y-4">
                        <div class="w-16 h-16 mx-auto rounded-full bg-indigo-500/10 flex items-center justify-center">
                            <svg class="w-8 h-8 text-indigo-500 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-black" x-text="rtl ? 'جاري السحب...' : 'Syncing Messages...'"></h4>
                        <p class="text-sm text-gray-500" x-text="rtl ? 'يرجى الانتظار، نقوم بجلب المحادثات من ' + (platform === 'both' ? 'كلا المنصتين' : (platform === 'facebook' ? 'فيسبوك' : 'إنستجرام')) : 'Please wait, fetching from ' + (platform === 'both' ? 'both platforms' : platform)"></p>
                    </div>

                    <div class="space-y-2">
                        <div class="flex justify-between text-xs font-bold">
                            <span x-text="rtl ? 'التقدم' : 'Progress'"></span>
                            <span x-text="syncProgress + '%'"></span>
                        </div>
                        <div class="h-2 w-full bg-gray-200 dark:bg-slate-800 rounded-full overflow-hidden">
                            <div class="h-full bg-indigo-600 rounded-full transition-all duration-300" :style="'width: ' + syncProgress + '%'"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Marketation\Desktop\airespondsass\resources\views/user/inbox.blade.php ENDPATH**/ ?>