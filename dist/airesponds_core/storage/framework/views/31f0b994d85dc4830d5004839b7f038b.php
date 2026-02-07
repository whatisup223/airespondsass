

<?php $__env->startSection('title', 'AI Providers'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-5xl mx-auto space-y-10 animate-in fade-in slide-in-from-bottom-6 duration-1000">
        <!-- Header -->
        <div>
            <h1 class="text-3xl font-black mb-2" x-text="rtl ? 'مزودي الذكاء الاصطناعي' : 'AI Providers Integration'"></h1>
            <p class="text-gray-500 font-medium"
                x-text="rtl ? 'قم بضبط مفاتيح الـ API المركزية التي ستستخدمها المنصة للرد على العملاء' : 'Configure central API keys used by the platform for all AI operations'">
            </p>
        </div>

        <!-- Provider Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- OpenAI Card -->
            <div
                class="bg-white dark:bg-slate-900/50 p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 space-y-8 relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 opacity-5 group-hover:scale-110 transition-all duration-700">
                    <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M22.2819 9.8211a5.9847 5.9847 0 0 0-.5153-4.9066 6.0462 6.0462 0 0 0-3.9998-2.8271 6.0417 6.0417 0 0 0-5.6077 1.5518 6.0298 6.0298 0 0 0-4.4114-1.9565 6.0356 6.0356 0 0 0-5.1374 2.8482 6.0166 6.0166 0 0 0-1.3162 5.8213 6.0335 6.0335 0 0 0 .5203 4.902 6.0502 6.0502 0 0 0 4.003 2.8259 6.0511 6.0511 0 0 0 5.6133-1.5543 6.0307 6.0307 0 0 0 4.4108 1.9549 6.0356 6.0356 0 0 0 5.1387-2.8482 6.0166 6.0166 0 0 0 1.3013-5.8213zM12.0844 15.5917a3.0762 3.0762 0 0 1-2.9808-2.511l.0192-.0109 2.9039-1.6334a.1737.1737 0 0 0 .0869-.1415V7.1285l2.5652 1.4814a.0087.0087 0 0 1 .0044.0087v3.2934l.0087.0044 2.879 1.6213a.0087.0087 0 0 1 .0044.0087 3.0903 3.0903 0 0 1-1.1352 2.0527 3.0816 3.0816 0 0 1-4.3547-.0065zm-9.354-9.58c0-1.2588.7523-2.3861 1.9141-2.8624a3.0051 3.0051 0 0 1 2.3703-.1625l-.018.0108 2.904 1.6334a.1777.1777 0 0 0 .1479.0261L12.9814 3.73l-2.5651-1.4814a.0087.0087 0 0 1-.0044-.0087l-2.851-.0108a.0087.0087 0 0 1-.0087-.0087 3.0894 3.0894 0 0 1-2.0195-1.1718c-.372-.4567-.58-1.0258-.58-1.614z" />
                    </svg>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 rounded-2xl bg-black text-white flex items-center justify-center text-xl shadow-xl">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.2819 9.8211a5.9847 5.9847 0 0 0-.5153-4.9066 6.0462 6.0462 0 0 0-3.9998-2.8271 6.0417 6.0417 0 0 0-5.6077 1.5518 6.0298 6.0298 0 0 0-4.4114-1.9565 6.0356 6.0356 0 0 0-5.1374 2.8482 6.0166 6.0166 0 0 0-1.3162 5.8213 6.0335 6.0335 0 0 0 .5203 4.902 6.0502 6.0502 0 0 0 4.003 2.8259 6.0511 6.0511 0 0 0 5.6133-1.5543 6.0307 6.0307 0 0 0 4.4108 1.9549 6.0356 6.0356 0 0 0 5.1387-2.8482 6.0166 6.0166 0 0 0 1.3013-5.8213zM12.0844 15.5917a3.0762 3.0762 0 0 1-2.9808-2.511l.0192-.0109 2.9039-1.6334a.1737.1737 0 0 0 .0869-.1415V7.1285l2.5652 1.4814a.0087.0087 0 0 1 .0044.0087v3.2934l.0087.0044 2.879 1.6213a.0087.0087 0 0 1 .0044.0087 3.0903 3.0903 0 0 1-1.1352 2.0527 3.0816 3.0816 0 0 1-4.3547-.0065z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-black">OpenAI</h3>
                    </div>
                    <div x-data="{ on: true }" @click="on = !on"
                        class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all"
                        :class="on ? 'bg-emerald-500' : 'bg-gray-200 dark:bg-slate-700'">
                        <div class="w-4 h-4 bg-white rounded-full transition-all"
                            :class="on ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''"></div>
                    </div>
                </div>

                <form class="space-y-6">
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                            x-text="rtl ? 'مفتاح الـ API' : 'Secret API Key'"></label>
                        <input type="password" value="sk-••••••••••••••••"
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-rose-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                            x-text="rtl ? 'الموديل الافتراضي' : 'Default Model'"></label>
                        <select
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-rose-500/30 px-4 rounded-2xl outline-none dark:text-white transition-all appearance-none">
                            <option value="gpt-4o">GPT-4o (Latest)</option>
                            <option value="gpt-4">GPT-4</option>
                            <option value="gpt-3.5-turbo">GPT-3.5 Turbo</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="w-full py-4 bg-slate-900 dark:bg-white dark:text-slate-900 text-white font-black rounded-2xl shadow-xl transition-all hover:scale-[1.02]"
                        x-text="rtl ? 'حفظ إعدادات OpenAI' : 'Save OpenAI Config'"></button>
                </form>
            </div>

            <!-- Gemini Card -->
            <div
                class="bg-white dark:bg-slate-900/50 p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 space-y-8 relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 opacity-5 group-hover:scale-110 transition-all duration-700">
                    <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L4.5 20.29l.71.71L12 18l6.79 3 .71-.71L12 2z" />
                    </svg>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-blue-600 to-indigo-600 text-white flex items-center justify-center text-xl shadow-xl">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-11v4h2v-4h3l-4-4-4 4h3z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-black">Google Gemini</h3>
                    </div>
                    <div x-data="{ on: false }" @click="on = !on"
                        class="w-12 h-6 rounded-full p-1 cursor-pointer transition-all"
                        :class="on ? 'bg-emerald-500' : 'bg-gray-200 dark:bg-slate-700'">
                        <div class="w-4 h-4 bg-white rounded-full transition-all"
                            :class="on ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''"></div>
                    </div>
                </div>

                <form class="space-y-6">
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                            x-text="rtl ? 'مفتاح الـ API' : 'Gemini API Key'"></label>
                        <input type="password" placeholder="AIzaSy..."
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-rose-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                            x-text="rtl ? 'الموديل الافتراضي' : 'Default Model'"></label>
                        <select
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-rose-500/30 px-4 rounded-2xl outline-none dark:text-white transition-all appearance-none">
                            <option value="gemini-1.5-pro-latest">Gemini 1.5 Pro</option>
                            <option value="gemini-1.5-flash">Gemini 1.5 Flash</option>
                            <option value="gemini-pro">Gemini 1.0 Pro</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="w-full py-4 bg-indigo-600 text-white font-black rounded-2xl shadow-xl transition-all hover:scale-[1.02]"
                        x-text="rtl ? 'حفظ إعدادات Gemini' : 'Save Gemini Config'"></button>
                </form>
            </div>
        </div>

        <!-- Global AI Behavior -->
        <div class="bg-white dark:bg-slate-900/50 p-10 rounded-[3rem] border border-gray-100 dark:border-white/5 space-y-8">
            <h3 class="text-2xl font-black"
                x-text="rtl ? 'إعدادات سلوك الذكاء الاصطناعي العامة' : 'Global AI Behavior Settings'"></h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="space-y-3">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest"
                        x-text="rtl ? 'درجة الإبداع (Temperature)' : 'Creativity Level'"></label>
                    <input type="range" min="0" max="100" value="70" class="w-full accent-rose-500">
                    <p class="text-xs font-black text-rose-500">0.7 - Balanced</p>
                </div>
                <div class="space-y-3">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest"
                        x-text="rtl ? 'الحد الأقصى للكلمات' : 'Max Response Tokens'"></label>
                    <input type="number" value="256"
                        class="w-full h-12 bg-gray-50 dark:bg-slate-800 text-center rounded-xl font-bold">
                </div>
                <div class="space-y-3">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest"
                        x-text="rtl ? 'نظام الـ Safety' : 'Safety Filter'"></label>
                    <div class="flex justify-center gap-2">
                        <span
                            class="px-3 py-1 rounded-lg bg-emerald-500/10 text-emerald-500 text-[10px] font-black uppercase">Standard</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Marketation\Desktop\airespondsass\resources\views/admin/ai-providers.blade.php ENDPATH**/ ?>