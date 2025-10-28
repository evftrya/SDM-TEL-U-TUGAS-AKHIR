@php
    $active_sidebar = 'Riwayat Jabatan';
@endphp

@extends('kelola_data.base-profile')

@section('content-profile')
    <style>
        [data-uia-timeline-skin="4"] {
            --_uia-timeline-line-color_default: #222;
            --_uia-timeline-space: 0.4rem;
            --_uia-timeline-line-thickness: 1.5px;
            --_uia-timeline-year-size: 2.8rem;
            /* sebelumnya 3.5rem */
        }

        [data-uia-timeline-skin="4"] .uia-timeline__container {
            position: relative;
            gap: 1.8rem;
            /* sebelumnya 2.5rem */
        }

        [data-uia-timeline-skin="4"] .uia-timeline__line {
            inline-size: var(--_uia-timeline-line-thickness);
            block-size: 100%;
            background-color: var(--_uia-timeline-line-color_default);
            position: absolute;
            inset-block-start: 0;
            inset-inline-start: calc(var(--_uia-timeline-year-size) / 2);
            transform: translate(-50%);
            z-index: -1;
        }

        [data-uia-timeline-skin="4"] .uia-timeline__line_right {
            inline-size: var(--_uia-timeline-line-thickness);
            block-size: 100%;
            background-color: var(--_uia-timeline-line-color_default);
            position: absolute;
            inset-block-start: 0;
            inset-inline-end: calc(var(--_uia-timeline-year-size) / 2);
            /* ubah dari start → end */
            transform: translate(50%);
            /* arah translasi juga dibalik */
            z-index: -1;
        }

        [data-uia-timeline-skin="4"] .uia-timeline__annual-sections {
            display: flex;
            align-items: flex-start;
            isolation: isolate;
        }

        [data-uia-timeline-skin="4"] .uia-timeline__groups {
            padding-inline-start: var(--_uia-timeline-space);
            padding-block-start: calc(var(--_uia-timeline-year-size) + 1rem);
            /* dikurangi */
        }

        [data-uia-timeline-skin="4"] .uia-timeline__point {
            background-color: #fff;
            border-inline-start: 2px solid #4557bb;
            /* sedikit lebih tipis */
            padding: 1rem 1rem 0.75rem;
            /* dikurangi */
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            font-size: 0.9rem;
            /* sedikit lebih kecil */
        }


        [data-uia-timeline-skin="4"] .uia-timeline__point_right {
            background-color: #fff;
            /* border-inline-start: 2px solid #4557bb; */
            /* border-inline-end: 2px solid #4557bb; */
            /* sedikit lebih tipis */
            padding: 1rem 1rem 0.75rem;
            /* dikurangi */
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            font-size: 0.9rem;
        }

        @layer components {
            .uia-timeline__point_right {
                @apply border-r-2 border-[#4557bb];
            }

            .uia-timeline__point_left {
                @apply border-l-2 border-[#4557bb];
            }
        }

        [data-uia-timeline-skin="4"] .uia-timeline__point_right {
            @apply bg-white p-4 pb-3 shadow-sm text-sm;
        }


        [data-uia-timeline-skin="4"] .uia-timeline__year {
            flex: none;
            inline-size: var(--_uia-timeline-year-size);
            block-size: var(--_uia-timeline-year-size);
            border: 1.5px solid #4557bb;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background-color: #f0f0f0;
            font-size: 0.7rem;
            color: #222;
        }

        body {
            background-color: #f0f0f0;
            font-family: system-ui;
            color: #222;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .page {
            box-sizing: border-box;
            inline-size: min(100%, 80ch);
            /* dari 90ch jadi 80ch */
            padding: 3rem 1.5rem 2rem;
            /* padding dikurangi */
            margin-inline: auto;
        }
    </style>

    <div class="flex items-center gap-[29px]"><span
            class="font-semibold text-[24.083213806152344px] leading-[20.44701385498047px] text-[#101828]">Riwayat
            Jabatan</span></div>
    <div class="flex flex-col md:flex-row gap-3 w-full">
        <div class="page mx-0 flex flex-grow w-full" data-uia-timeline-skin="4"
            data-uia-timeline-adapter-skin-4="uia-card-skin-#1">
            <div class="uia-timeline">
                <div class="uia-timeline__container">
                    <div class="uia-timeline__line"></div>

                    <!-- Tahun 2008 -->
                    <div class="uia-timeline__annual-sections">
                        <span class="uia-timeline__year" aria-hidden="true">2008</span>
                        <div class="uia-timeline__groups gap-2">
                            <section class="uia-timeline__group" aria-labelledby="timeline-heading-1">
                                <div class="uia-timeline__point uia-card" data-uia-card-skin="1" data-uia-card-mod="1">
                                    <div class="uia-card__container">
                                        <div class="uia-card__intro">
                                            <h3 id="timeline-heading-1" class="ra-heading">Philadelphia Museum School of
                                                Industrial Art</h3>
                                            <span class="uia-card__time">
                                                <time datetime="2008-02-02">
                                                    <span class="uia-card__day">2</span>
                                                    <span>Feb</span>
                                                </time>
                                            </span>
                                        </div>
                                        <div class="uia-card__body">
                                            <div class="uia-card__description">
                                                <p>Attends the Philadelphia Museum School of Industrial Art. Studies design
                                                    with Alexey Brodovitch, art director at Harper's Bazaar, and works as
                                                    his assistant.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <!-- Tahun 2014 -->
                    <div class="uia-timeline__annual-sections">
                        <span class="uia-timeline__year" aria-hidden="true">2014</span>
                        <div class="uia-timeline__groups">
                            <section class="uia-timeline__group" aria-labelledby="timeline-heading-3">
                                <div class="uia-timeline__point uia-card" data-uia-card-skin="1" data-uia-card-mod="1">
                                    <div class="uia-card__container">
                                        <div class="uia-card__intro">
                                            <h3 id="timeline-heading-3" class="ra-heading">My travel to Europe</h3>
                                            <span class="uia-card__time">
                                                <time datetime="2014-07-14">
                                                    <span class="uia-card__day">14</span>
                                                    <span>Jul</span>
                                                </time>
                                            </span>
                                        </div>
                                        <div class="uia-card__body">
                                            <div class="uia-card__description">
                                                <p>Travels to France, Italy, Spain, and Peru. After completing fashion
                                                    editorial in Lima, prolongs stay to make portraits of local people in a
                                                    daylight studio.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="page mx-0 flex flex-grow w-full" data-uia-timeline-skin="4"
            data-uia-timeline-adapter-skin-4="uia-card-skin-#1">
            <div class="uia-timeline">
                <div class="uia-timeline__container">
                    <div class="uia-timeline__line_right"></div>

                    <!-- Tahun 2008 -->
                    <div class="uia-timeline__annual-sections">
                        <div class="uia-timeline__groups gap-2">
                            <section class="uia-timeline__group" aria-labelledby="timeline-heading-1">
                                <div class="uia-timeline__point_right border-l-blue-600 border-l-2 md:border-r-2 md:border-r-blue-600 uia-card"
                                    data-uia-card-skin="1" data-uia-card-mod="1">
                                    <div class="uia-card__container">
                                        <div class="uia-card__intro">
                                            <h3 id="timeline-heading-1" class="ra-heading">Philadelphia Museum School of
                                                Industrial Art</h3>
                                            <span class="uia-card__time">
                                                <time datetime="2008-02-02">
                                                    <span class="uia-card__day">2</span>
                                                    <span>Feb</span>
                                                </time>
                                            </span>
                                        </div>
                                        <div class="uia-card__body">
                                            <div class="uia-card__description">
                                                <p>Attends the Philadelphia Museum School of Industrial Art. Studies design
                                                    with Alexey Brodovitch, art director at Harper's Bazaar, and works as
                                                    his assistant.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <span class="uia-timeline__year" aria-hidden="true">2008</span>

                    </div>

                    <!-- Tahun 2014 -->
                    <div class="uia-timeline__annual-sections">
                        <div class="uia-timeline__groups">
                            <section class="uia-timeline__group" aria-labelledby="timeline-heading-3">
                                <div class="uia-timeline__point_right uia-card" data-uia-card-skin="1"
                                    data-uia-card-mod="1">
                                    <div class="uia-card__container">
                                        <div class="uia-card__intro">
                                            <h3 id="timeline-heading-3" class="ra-heading">My travel to Europe</h3>
                                            <span class="uia-card__time">
                                                <time datetime="2014-07-14">
                                                    <span class="uia-card__day">14</span>
                                                    <span>Jul</span>
                                                </time>
                                            </span>
                                        </div>
                                        <div class="uia-card__body">
                                            <div class="uia-card__description">
                                                <p>Travels to France, Italy, Spain, and Peru. After completing fashion
                                                    editorial in Lima, prolongs stay to make portraits of local people in a
                                                    daylight studio.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <span class="uia-timeline__year" aria-hidden="true">2014</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
