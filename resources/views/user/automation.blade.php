@extends('layouts.dashboard')

@section('title', 'AI Automation Hub')

@section('content')
    <div class="max-w-7xl mx-auto space-y-8 animate-in fade-in slide-in-from-bottom-6 duration-1000" x-data="{ 
        activeTab: 'persona',
        saving: false,
        // Persona Settings
        botName: 'Sara',
        tone: 'friendly',
        language: 'both',
        replyStyle: 'detailed',
        signature: 'فريق خدمة العملاء 💙',
        // Comments Settings
        commentsSettings: {
            autoReply: true,
            hideAfterReply: false,
            deleteAfterReply: false,
            autoLike: true,
            mentionCustomer: true,
            replyViaDM: false,
            ignoreNegative: false,
            escalateSensitive: true
        },
        // Messages Settings
        messagesSettings: {
            instantReply: true,
            replyDelay: 2,
            welcomeMessage: true,
            autoMarkRead: true,
            pauseDuringHours: false,
            replyToOld: false,
            typingIndicator: true
        },
        welcomeText: 'مرحباً! كيف يمكنني مساعدتك اليوم؟',
        workingHoursStart: '08:00',
        workingHoursEnd: '22:00'
    }">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black mb-2"
                    x-text="rtl ? 'مركز التحكم في الذكاء الاصطناعي' : 'AI Automation Control Center'"></h1>
                <p class="text-gray-500 font-medium"
                    x-text="rtl ? 'تحكم كامل في سلوك البوت، قاعدة المعرفة، وقواعد الأتمتة الذكية' : 'Full control over bot behavior, knowledge base, and smart automation rules'">
                </p>
            </div>
            <div class="flex items-center gap-3">
                <button
                    class="px-6 py-3 border border-gray-200 dark:border-white/5 rounded-2xl text-sm font-bold hover:bg-white/5 transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <span x-text="rtl ? 'معاينة' : 'Preview'"></span>
                </button>
                <button @click="saving = true; setTimeout(() => saving = false, 1500)"
                    class="px-8 py-3 bg-indigo-600 text-white font-black rounded-2xl shadow-xl shadow-indigo-600/30 hover:scale-105 transition-all flex items-center gap-2">
                    <template x-if="!saving">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </template>
                    <template x-if="saving">
                        <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </template>
                    <span
                        x-text="saving ? (rtl ? 'جاري الحفظ...' : 'Saving...') : (rtl ? 'حفظ الإعدادات' : 'Save Settings')"></span>
                </button>
            </div>
        </div>

        <!-- Tabs Navigation -->
        <div
            class="bg-white dark:bg-slate-900/50 rounded-[2.5rem] border border-gray-100 dark:border-white/5 p-3 overflow-x-auto">
            <div class="flex gap-2 min-w-max">
                <button @click="activeTab = 'persona'"
                    :class="activeTab === 'persona' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'bg-transparent text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-800'"
                    class="px-6 py-4 rounded-[1.5rem] font-bold text-sm transition-all flex items-center gap-3 whitespace-nowrap">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <span x-text="rtl ? 'شخصية البوت' : 'AI Persona'"></span>
                </button>
                <button @click="activeTab = 'knowledge'"
                    :class="activeTab === 'knowledge' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'bg-transparent text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-800'"
                    class="px-6 py-4 rounded-[1.5rem] font-bold text-sm transition-all flex items-center gap-3 whitespace-nowrap">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span x-text="rtl ? 'قاعدة المعرفة' : 'Knowledge Base'"></span>
                </button>
                <button @click="activeTab = 'comments'"
                    :class="activeTab === 'comments' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'bg-transparent text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-800'"
                    class="px-6 py-4 rounded-[1.5rem] font-bold text-sm transition-all flex items-center gap-3 whitespace-nowrap">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    <span x-text="rtl ? 'إعدادات التعليقات' : 'Comments Rules'"></span>
                </button>
                <button @click="activeTab = 'messages'"
                    :class="activeTab === 'messages' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'bg-transparent text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-800'"
                    class="px-6 py-4 rounded-[1.5rem] font-bold text-sm transition-all flex items-center gap-3 whitespace-nowrap">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span x-text="rtl ? 'إعدادات الرسائل' : 'Messages Rules'"></span>
                </button>
                <button @click="activeTab = 'triggers'"
                    :class="activeTab === 'triggers' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'bg-transparent text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-800'"
                    class="px-6 py-4 rounded-[1.5rem] font-bold text-sm transition-all flex items-center gap-3 whitespace-nowrap">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span x-text="rtl ? 'المحفزات الذكية' : 'Smart Triggers'"></span>
                </button>
            </div>
        </div>

        <!-- Tab Content -->
        <div
            class="bg-white dark:bg-slate-900/50 rounded-[3rem] border border-gray-100 dark:border-white/5 p-10 min-h-[600px]">

            <!-- Persona Tab -->
            <div x-show="activeTab === 'persona'" x-transition class="space-y-8">
                <div>
                    <h2 class="text-2xl font-black mb-2"
                        x-text="rtl ? 'شخصية البوت وأسلوب التواصل' : 'Bot Personality & Communication Style'"></h2>
                    <p class="text-gray-500 text-sm"
                        x-text="rtl ? 'حدد كيف سيتحدث البوت مع عملائك' : 'Define how your bot will communicate with customers'">
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                            x-text="rtl ? 'اسم البوت' : 'Bot Name'"></label>
                        <input type="text" x-model="botName"
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800 border-2 border-transparent focus:border-indigo-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                            x-text="rtl ? 'نبرة الصوت' : 'Tone of Voice'"></label>
                        <select x-model="tone"
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800 border-2 border-transparent focus:border-indigo-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                            <option value="formal" x-text="rtl ? 'رسمي' : 'Formal'"></option>
                            <option value="friendly" x-text="rtl ? 'ودود' : 'Friendly'"></option>
                            <option value="playful" x-text="rtl ? 'مرح' : 'Playful'"></option>
                            <option value="professional" x-text="rtl ? 'احترافي' : 'Professional'"></option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                            x-text="rtl ? 'اللغة الأساسية' : 'Primary Language'"></label>
                        <select x-model="language"
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800 border-2 border-transparent focus:border-indigo-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                            <option value="arabic" x-text="rtl ? 'عربي فقط' : 'Arabic Only'"></option>
                            <option value="english" x-text="rtl ? 'إنجليزي فقط' : 'English Only'"></option>
                            <option value="both" x-text="rtl ? 'ثنائي اللغة' : 'Bilingual'"></option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                            x-text="rtl ? 'أسلوب الرد' : 'Reply Style'"></label>
                        <select x-model="replyStyle"
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800 border-2 border-transparent focus:border-indigo-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                            <option value="short" x-text="rtl ? 'قصير ومباشر' : 'Short & Direct'"></option>
                            <option value="detailed" x-text="rtl ? 'تفصيلي' : 'Detailed'"></option>
                            <option value="emoji" x-text="rtl ? 'مع إيموجي' : 'With Emojis'"></option>
                        </select>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                        x-text="rtl ? 'التوقيع (يظهر في نهاية كل رسالة)' : 'Signature (appears at end of messages)'"></label>
                    <input type="text" x-model="signature"
                        class="w-full h-14 bg-gray-50 dark:bg-slate-800 border-2 border-transparent focus:border-indigo-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                </div>
            </div>

            <!-- Knowledge Base Tab -->
            <div x-show="activeTab === 'knowledge'" x-transition class="space-y-8">
                <div>
                    <h2 class="text-2xl font-black mb-2"
                        x-text="rtl ? 'قاعدة المعرفة والتدريب' : 'Knowledge Base & Training'"></h2>
                    <p class="text-gray-500 text-sm"
                        x-text="rtl ? 'درّب البوت على معلومات عملك ومنتجاتك' : 'Train your bot on your business information and products'">
                    </p>
                </div>

                <!-- File Upload Zone -->
                <div
                    class="border-2 border-dashed border-gray-200 dark:border-white/10 rounded-[2rem] p-12 text-center hover:border-indigo-500/30 transition-all cursor-pointer group">
                    <div
                        class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-indigo-500/10 flex items-center justify-center group-hover:scale-110 transition-all">
                        <svg class="w-8 h-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-black mb-2"
                        x-text="rtl ? 'اسحب الملفات هنا أو اضغط للرفع' : 'Drag files here or click to upload'"></h3>
                    <p class="text-sm text-gray-500"
                        x-text="rtl ? 'يدعم: PDF, DOCX, TXT, CSV (حتى 10 ميجا)' : 'Supports: PDF, DOCX, TXT, CSV (up to 10MB)'">
                    </p>
                </div>

                <!-- Uploaded Files List -->
                <div class="space-y-3">
                    <h3 class="text-sm font-black text-gray-400 uppercase tracking-widest"
                        x-text="rtl ? 'الملفات المرفوعة' : 'Uploaded Files'"></h3>
                    <template x-for="i in 3" :key="i">
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-slate-800/50 rounded-2xl">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-xl bg-red-500/10 text-red-500 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm" x-text="'product_catalog_' + i + '.pdf'"></h4>
                                    <p class="text-[10px] text-gray-500">2.4 MB • Uploaded 2 days ago</p>
                                </div>
                            </div>
                            <button
                                class="w-8 h-8 rounded-lg hover:bg-red-500/10 text-red-500 flex items-center justify-center transition-all">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </template>
                </div>

                <!-- Manual Text Entry -->
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                        x-text="rtl ? 'إضافة معلومات نصية مباشرة' : 'Add Manual Text Information'"></label>
                    <textarea rows="8" placeholder="مثال: نحن نقدم خدمة التوصيل المجاني لكل الطلبات فوق 200 ريال..."
                        class="w-full bg-gray-50 dark:bg-slate-800 border-2 border-transparent focus:border-indigo-500/30 p-6 rounded-2xl outline-none dark:text-white transition-all resize-none"></textarea>
                </div>
            </div>

            <!-- Comments Tab -->
            <div x-show="activeTab === 'comments'" x-transition class="space-y-8">
                <div>
                    <h2 class="text-2xl font-black mb-2"
                        x-text="rtl ? 'إعدادات التعليقات التلقائية' : 'Automated Comments Settings'"></h2>
                    <p class="text-gray-500 text-sm"
                        x-text="rtl ? 'تحكم في كيفية تعامل البوت مع التعليقات على منشوراتك' : 'Control how the bot handles comments on your posts'">
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Auto Reply -->
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 flex items-center justify-between">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm mb-1"
                                x-text="rtl ? 'الرد التلقائي على التعليقات' : 'Auto-Reply to Comments'"></h4>
                            <p class="text-xs text-gray-500"
                                x-text="rtl ? 'تفعيل الرد الآلي على كل التعليقات' : 'Enable automatic replies to all comments'">
                            </p>
                        </div>
                        <div @click="commentsSettings.autoReply = !commentsSettings.autoReply"
                            class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ml-4"
                            :class="commentsSettings.autoReply ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'">
                            <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm"
                                :class="commentsSettings.autoReply ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''"></div>
                        </div>
                    </div>

                    <!-- Hide After Reply -->
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 flex items-center justify-between">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm mb-1"
                                x-text="rtl ? 'إخفاء التعليق بعد الرد' : 'Hide Comment After Reply'"></h4>
                            <p class="text-xs text-gray-500"
                                x-text="rtl ? 'إخفاء التعليق من العرض العام بعد الرد عليه' : 'Hide comment from public view after replying'">
                            </p>
                        </div>
                        <div @click="commentsSettings.hideAfterReply = !commentsSettings.hideAfterReply"
                            class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ml-4"
                            :class="commentsSettings.hideAfterReply ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'">
                            <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm"
                                :class="commentsSettings.hideAfterReply ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''">
                            </div>
                        </div>
                    </div>

                    <!-- Delete After Reply -->
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 flex items-center justify-between">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm mb-1"
                                x-text="rtl ? 'حذف التعليق بعد الرد' : 'Delete Comment After Reply'"></h4>
                            <p class="text-xs text-gray-500"
                                x-text="rtl ? 'حذف التعليق نهائياً بعد الرد (للتعليقات السلبية)' : 'Permanently delete comment after reply (for negative comments)'">
                            </p>
                        </div>
                        <div @click="commentsSettings.deleteAfterReply = !commentsSettings.deleteAfterReply"
                            class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ml-4"
                            :class="commentsSettings.deleteAfterReply ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'">
                            <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm"
                                :class="commentsSettings.deleteAfterReply ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''">
                            </div>
                        </div>
                    </div>

                    <!-- Auto Like -->
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 flex items-center justify-between">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm mb-1" x-text="rtl ? 'الإعجاب التلقائي' : 'Auto-Like Comments'">
                            </h4>
                            <p class="text-xs text-gray-500"
                                x-text="rtl ? 'الإعجاب بكل تعليق تلقائياً' : 'Automatically like every comment'"></p>
                        </div>
                        <div @click="commentsSettings.autoLike = !commentsSettings.autoLike"
                            class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ml-4"
                            :class="commentsSettings.autoLike ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'">
                            <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm"
                                :class="commentsSettings.autoLike ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''"></div>
                        </div>
                    </div>

                    <!-- Mention Customer -->
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 flex items-center justify-between">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm mb-1"
                                x-text="rtl ? 'عمل منشن للعميل' : 'Mention Customer in Reply'"></h4>
                            <p class="text-xs text-gray-500"
                                x-text="rtl ? 'إضافة @username في بداية الرد' : 'Add @username at the start of reply'"></p>
                        </div>
                        <div @click="commentsSettings.mentionCustomer = !commentsSettings.mentionCustomer"
                            class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ml-4"
                            :class="commentsSettings.mentionCustomer ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'">
                            <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm"
                                :class="commentsSettings.mentionCustomer ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''">
                            </div>
                        </div>
                    </div>

                    <!-- Reply via DM -->
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 flex items-center justify-between">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm mb-1" x-text="rtl ? 'الرد في رسالة خاصة' : 'Reply via DM Instead'">
                            </h4>
                            <p class="text-xs text-gray-500"
                                x-text="rtl ? 'إرسال الرد في رسالة خاصة بدلاً من التعليق العام' : 'Send reply as private message instead of public comment'">
                            </p>
                        </div>
                        <div @click="commentsSettings.replyViaDM = !commentsSettings.replyViaDM"
                            class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ml-4"
                            :class="commentsSettings.replyViaDM ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'">
                            <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm"
                                :class="commentsSettings.replyViaDM ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''">
                            </div>
                        </div>
                    </div>

                    <!-- Ignore Negative -->
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 flex items-center justify-between">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm mb-1"
                                x-text="rtl ? 'تجاهل التعليقات السلبية' : 'Ignore Negative Comments'"></h4>
                            <p class="text-xs text-gray-500"
                                x-text="rtl ? 'عدم الرد على التعليقات ذات المشاعر السلبية' : 'Don\'t reply to comments with negative sentiment'">
                            </p>
                        </div>
                        <div @click="commentsSettings.ignoreNegative = !commentsSettings.ignoreNegative"
                            class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ml-4"
                            :class="commentsSettings.ignoreNegative ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'">
                            <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm"
                                :class="commentsSettings.ignoreNegative ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''">
                            </div>
                        </div>
                    </div>

                    <!-- Escalate Sensitive -->
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 flex items-center justify-between">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm mb-1"
                                x-text="rtl ? 'تحويل التعليقات الحساسة' : 'Escalate Sensitive Comments'"></h4>
                            <p class="text-xs text-gray-500"
                                x-text="rtl ? 'تحويل التعليقات الحساسة للمشرف البشري' : 'Forward sensitive comments to human supervisor'">
                            </p>
                        </div>
                        <div @click="commentsSettings.escalateSensitive = !commentsSettings.escalateSensitive"
                            class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ml-4"
                            :class="commentsSettings.escalateSensitive ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'">
                            <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm"
                                :class="commentsSettings.escalateSensitive ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blocked Keywords -->
                <div class="space-y-2 pt-6 border-t dark:border-white/5">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                        x-text="rtl ? 'كلمات محظورة (افصل بفاصلة)' : 'Blocked Keywords (comma separated)'"></label>
                    <input type="text" placeholder="spam, scam, fake..."
                        class="w-full h-14 bg-gray-50 dark:bg-slate-800 border-2 border-transparent focus:border-indigo-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                    <p class="text-xs text-gray-500 px-2"
                        x-text="rtl ? 'التعليقات التي تحتوي على هذه الكلمات سيتم حذفها تلقائياً' : 'Comments containing these words will be automatically deleted'">
                    </p>
                </div>
            </div>

            <!-- Messages Tab -->
            <div x-show="activeTab === 'messages'" x-transition class="space-y-8">
                <div>
                    <h2 class="text-2xl font-black mb-2"
                        x-text="rtl ? 'إعدادات الرسائل التلقائية' : 'Automated Messages Settings'"></h2>
                    <p class="text-gray-500 text-sm"
                        x-text="rtl ? 'تحكم في كيفية تعامل البوت مع الرسائل الخاصة' : 'Control how the bot handles private messages'">
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Instant Reply -->
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 flex items-center justify-between">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm mb-1" x-text="rtl ? 'الرد الفوري' : 'Instant Auto-Reply'"></h4>
                            <p class="text-xs text-gray-500"
                                x-text="rtl ? 'الرد على الرسائل فوراً' : 'Reply to messages instantly'"></p>
                        </div>
                        <div @click="messagesSettings.instantReply = !messagesSettings.instantReply"
                            class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ml-4"
                            :class="messagesSettings.instantReply ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'">
                            <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm"
                                :class="messagesSettings.instantReply ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''">
                            </div>
                        </div>
                    </div>

                    <!-- Welcome Message -->
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 flex items-center justify-between">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm mb-1" x-text="rtl ? 'رسالة ترحيبية' : 'Welcome Message'"></h4>
                            <p class="text-xs text-gray-500"
                                x-text="rtl ? 'إرسال رسالة ترحيبية للعملاء الجدد' : 'Send welcome message to new customers'">
                            </p>
                        </div>
                        <div @click="messagesSettings.welcomeMessage = !messagesSettings.welcomeMessage"
                            class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ml-4"
                            :class="messagesSettings.welcomeMessage ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'">
                            <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm"
                                :class="messagesSettings.welcomeMessage ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''">
                            </div>
                        </div>
                    </div>

                    <!-- Auto Mark Read -->
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 flex items-center justify-between">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm mb-1"
                                x-text="rtl ? 'وضع علامة مقروء تلقائياً' : 'Auto-Mark as Read'"></h4>
                            <p class="text-xs text-gray-500"
                                x-text="rtl ? 'وضع علامة مقروء على الرسائل بعد الرد' : 'Mark messages as read after replying'">
                            </p>
                        </div>
                        <div @click="messagesSettings.autoMarkRead = !messagesSettings.autoMarkRead"
                            class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ml-4"
                            :class="messagesSettings.autoMarkRead ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'">
                            <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm"
                                :class="messagesSettings.autoMarkRead ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''">
                            </div>
                        </div>
                    </div>

                    <!-- Pause During Hours -->
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 flex items-center justify-between">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm mb-1" x-text="rtl ? 'إيقاف في أوقات محددة' : 'Pause During Hours'">
                            </h4>
                            <p class="text-xs text-gray-500"
                                x-text="rtl ? 'إيقاف البوت خارج ساعات العمل' : 'Pause bot outside working hours'"></p>
                        </div>
                        <div @click="messagesSettings.pauseDuringHours = !messagesSettings.pauseDuringHours"
                            class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ml-4"
                            :class="messagesSettings.pauseDuringHours ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'">
                            <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm"
                                :class="messagesSettings.pauseDuringHours ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''">
                            </div>
                        </div>
                    </div>

                    <!-- Reply to Old -->
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 flex items-center justify-between">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm mb-1"
                                x-text="rtl ? 'الرد على الرسائل القديمة' : 'Reply to Old Messages'"></h4>
                            <p class="text-xs text-gray-500"
                                x-text="rtl ? 'الرد على رسائل أكثر من 24 ساعة' : 'Reply to messages older than 24 hours'">
                            </p>
                        </div>
                        <div @click="messagesSettings.replyToOld = !messagesSettings.replyToOld"
                            class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ml-4"
                            :class="messagesSettings.replyToOld ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'">
                            <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm"
                                :class="messagesSettings.replyToOld ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''">
                            </div>
                        </div>
                    </div>

                    <!-- Typing Indicator -->
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 flex items-center justify-between">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm mb-1" x-text="rtl ? 'إظهار \" يكتب الآن...\"'
                                : 'Show Typing Indicator'"></h4>
                            <p class=" text-xs text-gray-500"
                                x-text="rtl ? 'إظهار مؤشر الكتابة قبل الرد' : 'Show typing indicator before replying'">
                                </p>
                        </div>
                        <div @click="messagesSettings.typingIndicator = !messagesSettings.typingIndicator"
                            class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all duration-300 flex-shrink-0 ml-4"
                            :class="messagesSettings.typingIndicator ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-slate-700'">
                            <div class="w-4 h-4 bg-white rounded-full transition-all duration-300 shadow-sm"
                                :class="messagesSettings.typingIndicator ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reply Delay -->
                <div class="space-y-2 pt-6 border-t dark:border-white/5">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                        x-text="rtl ? 'تأخير الرد (بالثواني)' : 'Reply Delay (seconds)'"></label>
                    <div class="flex items-center gap-4">
                        <input type="range" x-model="messagesSettings.replyDelay" min="0" max="10"
                            class="flex-grow h-2 bg-gray-200 dark:bg-slate-700 rounded-lg appearance-none cursor-pointer">
                        <span class="text-2xl font-black w-16 text-center"
                            x-text="messagesSettings.replyDelay + 's'"></span>
                    </div>
                    <p class="text-xs text-gray-500 px-2"
                        x-text="rtl ? 'تأخير بسيط يجعل الرد يبدو أكثر طبيعية' : 'Small delay makes replies appear more natural'">
                    </p>
                </div>

                <!-- Welcome Message Text -->
                <div class="space-y-2" x-show="messagesSettings.welcomeMessage">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                        x-text="rtl ? 'نص الرسالة الترحيبية' : 'Welcome Message Text'"></label>
                    <textarea x-model="welcomeText" rows="4"
                        class="w-full bg-gray-50 dark:bg-slate-800 border-2 border-transparent focus:border-indigo-500/30 p-6 rounded-2xl outline-none dark:text-white transition-all resize-none"></textarea>
                </div>

                <!-- Working Hours -->
                <div class="space-y-4" x-show="messagesSettings.pauseDuringHours">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                        x-text="rtl ? 'ساعات العمل' : 'Working Hours'"></label>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-xs text-gray-500 px-2" x-text="rtl ? 'من' : 'From'"></label>
                            <input type="time" x-model="workingHoursStart"
                                class="w-full h-14 bg-gray-50 dark:bg-slate-800 border-2 border-transparent focus:border-indigo-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs text-gray-500 px-2" x-text="rtl ? 'إلى' : 'To'"></label>
                            <input type="time" x-model="workingHoursEnd"
                                class="w-full h-14 bg-gray-50 dark:bg-slate-800 border-2 border-transparent focus:border-indigo-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Triggers Tab -->
            <div x-show="activeTab === 'triggers'" x-transition class="space-y-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-black mb-2"
                            x-text="rtl ? 'المحفزات والقواعد الذكية' : 'Smart Triggers & Rules'"></h2>
                        <p class="text-gray-500 text-sm"
                            x-text="rtl ? 'حدد كيف يتصرف البوت في سيناريوهات محددة' : 'Define how the bot behaves in specific scenarios'">
                        </p>
                    </div>
                    <button
                        class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-2xl shadow-lg shadow-indigo-600/20 hover:scale-105 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span x-text="rtl ? 'إضافة قاعدة' : 'Add Rule'"></span>
                    </button>
                </div>

                <!-- Triggers List -->
                <div class="space-y-4">
                    <template x-for="(trigger, index) in [
                        { condition: 'Price Inquiry', action: 'Send Price List', priority: 'high', keywords: 'price, كام, سعر' },
                        { condition: 'Angry Customer', action: 'Escalate to Supervisor', priority: 'critical', keywords: 'angry, غاضب, complaint' },
                        { condition: 'Purchase Intent', action: 'Send Payment Link', priority: 'high', keywords: 'buy, شراء, order' },
                        { condition: 'Delivery Question', action: 'Send Shipping Info', priority: 'medium', keywords: 'delivery, توصيل, shipping' }
                    ]" :key="index">
                        <div
                            class="p-6 rounded-2xl bg-gray-50 dark:bg-slate-800/30 border-2 border-transparent hover:border-indigo-500/20 transition-all">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-grow">
                                    <div class="flex items-center gap-3 mb-2">
                                        <h4 class="font-black text-sm" x-text="trigger.condition"></h4>
                                        <span class="px-2 py-1 rounded-lg text-[9px] font-black uppercase" :class="{
                                            'bg-red-500/10 text-red-500': trigger.priority === 'critical',
                                            'bg-orange-500/10 text-orange-500': trigger.priority === 'high',
                                            'bg-blue-500/10 text-blue-500': trigger.priority === 'medium'
                                        }" x-text="trigger.priority"></span>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-3"><span class="font-bold"
                                            x-text="rtl ? 'الكلمات المفتاحية:' : 'Keywords:'"></span> <span
                                            x-text="trigger.keywords"></span></p>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                        <span class="text-xs font-bold text-indigo-500" x-text="trigger.action"></span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button
                                        class="w-8 h-8 rounded-lg hover:bg-indigo-500/10 text-indigo-500 flex items-center justify-center transition-all">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded-lg hover:bg-red-500/10 text-red-500 flex items-center justify-center transition-all">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

        </div>
    </div>
@endsection