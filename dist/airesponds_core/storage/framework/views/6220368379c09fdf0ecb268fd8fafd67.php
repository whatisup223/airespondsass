

<?php $__env->startSection('title', 'Site Settings'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto space-y-10 animate-in fade-in slide-in-from-bottom-6 duration-1000">
        <!-- Header -->
        <div>
            <h1 class="text-3xl font-black mb-2" x-text="rtl ? 'الإعدادات العامة للمنصة' : 'Global Site Settings'"></h1>
            <p class="text-gray-500 font-medium"
                x-text="rtl ? 'تحكم في هوية الموقع، اللوجو، وإعدادات التواصل الأساسية' : 'Manage your site identity, branding, and core contact settings'">
            </p>
        </div>

        <div class="space-y-8">
            <!-- Branding Card -->
            <div
                class="bg-white dark:bg-slate-900/50 p-10 rounded-[3rem] border border-gray-100 dark:border-white/5 space-y-8">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-rose-500/10 text-rose-500 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-black" x-text="rtl ? 'الهوية والبصمة' : 'Branding & Identity'"></h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                            x-text="rtl ? 'اسم الموقع' : 'Site Name'"></label>
                        <input type="text" value="AutoReply AI"
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-rose-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                            x-text="rtl ? 'البريد الرسمي' : 'Support Email'"></label>
                        <input type="email" value="hello@ai-autoreply.com"
                            class="w-full h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-rose-500/30 px-6 rounded-2xl outline-none dark:text-white transition-all">
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2"
                        x-text="rtl ? 'اللوجو (PNG/SVG)' : 'Site Logo (PNG/SVG)'"></label>
                    <div
                        class="w-full h-32 border-2 border-dashed border-gray-100 dark:border-white/5 rounded-[2rem] flex flex-col items-center justify-center gap-2 hover:bg-white/5 transition-all cursor-pointer">
                        <svg class="w-8 h-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-[10px] font-bold text-gray-400"
                            x-text="rtl ? 'اضغط لرفع ملف جديد' : 'Click to upload new logo'"></span>
                    </div>
                </div>
            </div>

            <!-- System Maintenance Card -->
            <div
                class="bg-white dark:bg-slate-900/50 p-10 rounded-[3rem] border border-gray-100 dark:border-white/5 space-y-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black" x-text="rtl ? 'وضع الصيانة' : 'Maintenance Mode'"></h3>
                    </div>
                    <div x-data="{ on: false }" @click="on = !on"
                        class="w-14 h-8 rounded-full p-1 cursor-pointer transition-all duration-300"
                        :class="on ? 'bg-amber-500' : 'bg-gray-200 dark:bg-slate-700'">
                        <div class="w-6 h-6 bg-white rounded-full shadow-md transform transition-all duration-300"
                            :class="on ? (rtl ? '-translate-x-6' : 'translate-x-6') : ''"></div>
                    </div>
                </div>
                <p class="text-sm text-gray-500 leading-relaxed"
                    x-text="rtl ? 'عند تفعيل هذا الوضع، سيتوقف المستخدمون عن القدرة على الوصول للوحات التحكم الخاصة بهم، وسيظهر لهم إشعار بالصيانة.' : 'When enabled, users will see a maintenance page and won\'t be able to access their dashboards.'">
                </p>
            </div>

            <div class="flex justify-end">
                <button
                    class="px-10 py-5 bg-rose-600 text-white font-black rounded-3xl shadow-2xl shadow-rose-600/30 hover:scale-105 transition-all"
                    x-text="rtl ? 'حفظ كافة الإعدادات' : 'Save Site Settings'"></button>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Marketation\Desktop\airespondsass\resources\views/admin/settings.blade.php ENDPATH**/ ?>