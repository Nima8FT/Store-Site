<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="{{ route("admin.home") }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>

            <section class="sidebar-part-title">بخش فروش</section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>ویترین</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route("market.category.index") }}">دسته بندی</a>
                    <a href="{{ route("market.property.index") }}">فرم کالا</a>
                    <a href="{{ route("market.brand.index") }}">برندها</a>
                    <a href="{{ route("market.product.index") }}">کالاها</a>
                    <a href="{{ route("market.store.index") }}">انبار</a>
                    <a href="{{ route("market.comment.index") }}">نظرات</a>
                </section>
            </section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>سفارشات</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route("market.admin.market.order.newOrders") }}"> جدید</a>
                    <a href="{{ route("market.admin.market.order.sending") }}">در حال ارسال</a>
                    <a href="{{ route("market.admin.market.order.unpaid") }}">پرداخت نشده</a>
                    <a href="{{ route("market.admin.market.order.canceled") }}">باطل شده</a>
                    <a href="{{ route("market.admin.market.order.returned") }}">مرجوعی</a>
                    <a href="{{ route("market.admin.market.order.all") }}">تمام سفارشات</a>
                </section>
            </section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>پرداخت ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route("market.admin.market.payment.all") }}">تمام پرداخت ها</a>
                    <a href="{{ route("market.admin.market.payment.online") }}">پرداخت های آنلاین</a>
                    <a href="{{ route("market.admin.market.payment.offline") }}">پرداخت های آفلاین</a>
                    <a href="{{ route("market.admin.market.payment.attandance") }}">پرداخت در محل</a>
                </section>
            </section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>تخفیف ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route("market.copan.index") }}">کپن تخفیف</a>
                    <a href="{{ route("market.common-discount.index") }}">تخفیف عمومی</a>
                    <a href="{{ route("market.amazing-sale.index") }}">فروش شگفت انگیز</a>
                </section>
            </section>

            <a href="{{ route("market.delivery.index") }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>روش های ارسال</span>
            </a>



            <section class="sidebar-part-title">بخش محتوی</section>
            <a href="{{ route("content.category.index") }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته بندی</span>
            </a>
            <a href="{{ route("content.post.index") }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>پست ها</span>
            </a>
            <a href="{{ route("content.comment.index") }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>نظرات</span>
            </a>
            <a href="{{ route("content.menu.index") }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>منو</span>
            </a>
            <a href="{{ route("content.faq.index") }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>سوالات متداول</span>
            </a>
            <a href="{{ route("content.page.index") }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>پیج ساز</span>
            </a>



            <section class="sidebar-part-title">بخش کاربران</section>
            <a href="{{ route("user.admin-user.index") }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>کاربران ادمین</span>
            </a>
            <a href="{{ route("user.customer.index") }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>مشتریان</span>
            </a>
            <a href="{{ route("user.role.index") }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>سطوح دسترسی</span>
            </a>



            <section class="sidebar-part-title">تیکت ها</section>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های جدید</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های باز</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های بسته</span>
            </a>



            <section class="sidebar-part-title">اطلاع رسانی</section>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>اعلامیه ایمیلی</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>اعلامیه پیامکی</span>
            </a>



            <section class="sidebar-part-title">تنظیمات</section>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تنظیمات</span>
            </a>

        </section>
    </section>
</aside>