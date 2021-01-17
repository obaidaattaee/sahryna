<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::insert([
            "title" => "موقع اشترينا" ,
            "description" => " .موقع يهدف الى إتاحة خيار الشراكة في شراء سلع بالجملة ثم تفريقها بين الشركاء" ,
            "domain" => "Aishtarayna.com" ,
            "wellcom_message" => "اهلا بكم في موقع اشترينا" ,
            "logo_image" => 'اشترينا001.jpg' ,
            'goals' => ' <ul class="Terms">
                            <li>
                                <p class="p-for-Terms" >

                                    يسمح للشركاء شراء السلعة مفرقة بسعر الجملة وتخفيف عبئ زيارة متاجر الجملة
                                </p>
                            </li>
                            <li>
                                <p class="p-for-Terms" >

                                ضمان حفظ المبالغ وصيانتها
                                </p>
                            </li>
                            <li>
                                <p class="p-for-Terms" >

                                زيادة فرصة مبيعات سوق الجملة
                                </p>
                            </li>
                        </ul>',
            'idea' => ' <ul class="Terms">
                                            <li>
                                                <p class="p-for-Terms" >
                                                    إتاحة خيار الشراكة في شراء سلع بالجملة ثم تفريقها بين الشركاء
                                                ويسمح للتاجر بالتسويق لنفسه على المنصة بعرض منتجاته على المنصة
                                                </p>
                                            </li>
                                        </ul>',
                            'polices' => '<ul class="Terms">
                            <li>
                                <p class="p-for-Terms" >
                                    ان دخولك على هذه المنصة  يعني قبولك بجميع الشروط والأحكام الواردة هنا، وأي شروط أخرى يتم نشرها وتحديثها على   منصة اشترينا
                                </p>
                            </li>
                            <li>
                                <p class="p-for-Terms">
                                    إذا كنت غير موافق على هذه الشروط والأحكام يرجى عدم استخدام   المنصة
                                </p >
                            </li>
                            <li>
                                <p class="p-for-Terms">
                                    تحتفظ منصة اشترينا لنفسها بحق تغيير أو تعديل أو إضافة أو إزالة أجزاء من هذه الشروط والأحكام وفقا لتقديرها في أي وقت وبدون إشعار مسبق.
                                </p>
                            </li>
                            <li>
                                <p class="p-for-Terms">
                                    يرجى مراجعة هذه الصفحة بشكل دوري لأي تعديلات. علما أن استمرار استخدامك لهذه المنصة بعد نشر أي تغييرات سوف يعني أنك قد قبلت هذه التغييرات.
                                </p>
                            </li>
                            <li>

                        <p class="p-for-Terms">
                            يمنع نشر المحتويات غير القانونية أو التي تستهدف الترويج لممارسات وأنشطة غير مشروعة
                        </p>


                            </li>
                            <li>
                                <p class="p-for-Terms">
                                    يمنع نشر محتوى يضر بالمستخدمين أو أي أطراف أخرى .
                                </p>
                            </li>

                            <li>
                                <p class="p-for-Terms">
                                    يمنع  استخدام الموقع بطريقة غير قانونية واحتيالية أو نشر البرامج الضارة والفيروسات التي تضر بحسن سير عمل المتجر بشكل طبيعي .
                                </p>

                            </li>

                            <li>

                        <p class="p-for-Terms">
                            يمنع  نشر مواد أو محتوى يضر بالعلامات التجارية للمتجر أو أصحابه وشركائه .
                        </p>
                            </li>

                            <li>
                                <p class="p-for-Terms">
                                    يمنع التعدي على وانتحال وسرقة حسابات المستخدمين الآخرين أو التعدي على هويتهم .
                                </p>
                            </li>
                        </ul>
                    ' ,
                    'possible' => '

                    بموجب هذا فإنت توافق على أن  تذك شروط الأعلان
                    بأن المسلمون على شروطهم وأن طلب المشاركة سيتٌرتب عليهٌ شراء طالب الإعلان
                    السلعة على حسابه وأن الذمة لا تبرأ بالتراجع عن المشاركة دون سبب يعٌود لطالب
                    الشراكة أو لعيبٌ في السلعة وفي حال التراجع لابد من استئذان المعلن .
                '
        ]) ;
    }
}
