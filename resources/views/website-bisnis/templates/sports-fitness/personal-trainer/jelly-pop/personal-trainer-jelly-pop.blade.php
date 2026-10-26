<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Jelly Pop Personal Training — fun, personal fitness coaching made around your goals.">
    <title>Jelly Pop — Personal Training</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('css/website-bisnis/templates/sports-fitness/personal-trainer/jelly-pop/jelly-pop.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/website-bisnis/templates/sports-fitness/personal-trainer/jelly-pop/jelly-pop-festive-override.css') }}">
</head>

<body>
    <div class="jp-topbar"><span>YOUR GOALS. YOUR PACE. YOUR POP.</span><a href="#booking">Book a free intro call ↗</a>
    </div>
    <header class="jp-navbar">
        <a class="jp-brand" href="#home"><span class="jp-logo">J<span>✳</span></span><span><strong>jelly
                    pop</strong><small>PERSONAL TRAINING CLUB</small></span></a>
        <button class="jp-menu-toggle" id="jpMenuToggle" aria-label="Open navigation"
            aria-expanded="false"><span></span><span></span><span></span></button>
        <nav class="jp-nav" id="jpNav"><a href="#home">Home</a><a href="#programs">Programs</a><a
                href="#trainer">Your coach</a><a href="#transformations">Results</a><a href="#faq">FAQ</a><a
                class="jp-nav-cta" href="#booking">Let's get moving ↗</a></nav>
    </header>
    <main>
        <section class="jp-hero" id="home">
            <div class="jp-hero-copy"><span class="jp-kicker"><i></i> FITNESS THAT FITS REAL LIFE</span>
                <h1>Strong looks<br>good on <em>you.</em></h1>
                <p>Personal training that meets you where you are. Build strength, find your rhythm, and make progress
                    you can actually keep.</p>
                <div class="jp-hero-actions"><a class="jp-btn jp-btn-dark" href="#programs">Find your program
                        <span>↗</span></a><a class="jp-link" href="#trainer">Meet your coach <span>↓</span></a></div>
                <div class="jp-proof-row">
                    <div class="jp-avatar-stack"><span>A</span><span>M</span><span>N</span></div>
                    <p><strong>A little stronger every day.</strong><small>Beginner-friendly · Personal · No
                            pressure</small></p>
                </div>
            </div>
            <div class="jp-hero-art">
                <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=1100&q=85"
                    alt="Bright modern fitness studio">
                <div class="jp-sticker jp-sticker-pink">MOVE<br>YOUR<br>WAY!</div>
                <div class="jp-hero-note"><span>✳</span>
                    <div><strong>Progress over perfection</strong><small>We celebrate every win.</small></div>
                </div>
                <div class="jp-orbit"></div>
            </div>
            <div class="jp-marquee"><span>GOOD ENERGY ONLY ✳ STRONGER TOGETHER ✳ YOUR PACE, YOUR POWER ✳ GOOD ENERGY
                    ONLY ✳</span></div>
        </section>
        <section class="jp-intro jp-section">
            <div class="jp-section-label"><span>01</span> THE JELLY POP WAY</div>
            <div>
                <h2>Fitness isn't a punishment.<br><em>It's a promise to yourself.</em></h2>
                <p>No intimidating gym energy. No one-size-fits-all plans. Just thoughtful coaching, realistic routines,
                    and a little fun along the way.</p>
            </div>
        </section>
        <section class="jp-programs jp-section" id="programs">
            <div class="jp-heading">
                <div><span class="jp-kicker">PICK YOUR KIND OF PROGRESS</span>
                    <h2>Find your <em>feel-good fit.</em></h2>
                </div>
                <p>Choose a starting point. We'll personalize the details after learning about your goals, schedule, and
                    experience.</p>
            </div>
            <div class="jp-promo-banner">
                <div><span>✦ LIMITED-TIME DEMO OFFER</span><strong>Your next chapter starts with a little extra
                        value.</strong><small>Illustrative prices · Promo deadline: 1 December 2026</small></div>
                <div class="jp-countdown" data-deadline="2026-12-01T23:59:59+07:00"><span>OFFER ENDS IN</span>
                    <div><b data-days>00</b><small>days</small><b data-hours>00</b><small>hrs</small><b
                            data-minutes>00</b><small>min</small><b data-seconds>00</b><small>sec</small></div>
                    <p data-countdown-status>Demo promotion deadline: 1 December 2026.</p>
                </div>
            </div>
            <div class="jp-program-grid">
                <article class="jp-program-card jp-card-lilac">
                    <div class="jp-program-top"><span>01 / START HERE</span><span class="jp-icon">✳</span></div>
                    <h3>Fresh Start</h3>
                    <p>Build confidence, learn the basics, and create a routine that feels doable.</p>
                    <div class="jp-card-price"><span>Rp1.899.000</span><strong>Rp1.299.000</strong><small>32% OFF ·
                            Hemat Rp600.000</small><em>4 coached sessions · 4 weeks</em></div>
                    <ul>
                        <li>Movement & goal assessment</li>
                        <li>Beginner-friendly strength plan</li>
                        <li>Form and technique coaching</li>
                        <li>Weekly progress check-in</li>
                    </ul><a href="{{ url('/webia/template/personal-trainer-jelly-pop/detail') }}?package=fresh-start"
                        class="jp-card-link">Explore this program <b>↗</b></a>
                </article>
                <article class="jp-program-card jp-card-purple jp-featured"><span class="jp-ribbon">MOST LOVED</span>
                    <div class="jp-program-top"><span>02 / BUILD MOMENTUM</span><span class="jp-icon">✦</span></div>
                    <h3>Power Up</h3>
                    <p>Get stronger with a structured plan and coaching that keeps you accountable.</p>
                    <div class="jp-card-price"><span>Rp3.499.000</span><strong>Rp2.499.000</strong><small>29% OFF ·
                            Hemat Rp1.000.000</small><em>8 coached sessions · 4 weeks</em></div>
                    <ul>
                        <li>Personalized strength program</li>
                        <li>Technique & form feedback</li>
                        <li>Weekly check-in and adjustments</li>
                        <li>Habit and recovery guidance</li>
                    </ul><a href="{{ url('/webia/template/personal-trainer-jelly-pop/detail') }}?package=power-up"
                        class="jp-card-link">Explore this program <b>↗</b></a>
                </article>
                <article class="jp-program-card jp-card-blue">
                    <div class="jp-program-top"><span>03 / LEVEL UP</span><span class="jp-icon">✺</span></div>
                    <h3>Limitless</h3>
                    <p>For focused goals, higher-touch coaching, and a more complete training experience.</p>
                    <div class="jp-card-price"><span>Rp5.799.000</span><strong>Rp4.299.000</strong><small>26% OFF ·
                            Hemat Rp1.500.000</small><em>12 coached sessions · 6 weeks</em></div>
                    <ul>
                        <li>Advanced personalized plan</li>
                        <li>Priority coaching check-ins</li>
                        <li>Progress reviews and refinements</li>
                        <li>Nutrition habit guidance</li>
                    </ul><a href="{{ url('/webia/template/personal-trainer-jelly-pop/detail') }}?package=limitless"
                        class="jp-card-link">Explore this program <b>↗</b></a>
                </article>
            </div>
            <p class="jp-demo-note">Demo packages and prices are illustrative. Training frequency, delivery format, and
                final inclusions are confirmed during consultation.</p>
        </section>
        <section class="jp-trainer jp-section" id="trainer">
            <div class="jp-trainer-image"><img
                    src="https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?auto=format&fit=crop&w=1000&q=85"
                    alt="Personal trainer coaching a client"><span class="jp-sticker jp-sticker-purple">YOU'VE<br>GOT
                    THIS!</span></div>
            <div class="jp-trainer-copy"><span class="jp-kicker">YOUR COACH, IN YOUR CORNER</span>
                <h2>Meet the person<br>in your <em>corner.</em></h2>
                <p>Coaching should feel supportive, clear, and tailored to you. Your trainer will help you set realistic
                    goals, practice safe technique, and adjust your plan as life changes.</p>
                <div class="jp-credential-grid">
                    <div><strong>01</strong><span>Goal-led coaching</span></div>
                    <div><strong>02</strong><span>Technique-first training</span></div>
                    <div><strong>03</strong><span>Progress check-ins</span></div>
                    <div><strong>04</strong><span>Beginner-friendly support</span></div>
                </div><a href="#booking" class="jp-btn jp-btn-pink">Meet your coach ↗</a><small
                    class="jp-demo-note">Replace with the trainer's real name, credentials, and verified certifications
                    before publishing.</small>
            </div>
        </section>
        <section class="jp-goals jp-section">
            <div class="jp-heading">
                <div><span class="jp-kicker">YOUR GOALS, YOUR GAME PLAN</span>
                    <h2>Made for the way <em>you move.</em></h2>
                </div>
                <p>We'll shape a program around your starting point, preferences, and priorities.</p>
            </div>
            <div class="jp-goal-grid">
                <article><span>✦</span>
                    <h3>Build strength</h3>
                    <p>Learn the fundamentals and grow stronger with a plan that progresses with you.</p>
                </article>
                <article><span>♡</span>
                    <h3>Feel fitter</h3>
                    <p>Improve consistency, stamina, and confidence in everyday movement.</p>
                </article>
                <article><span>↗</span>
                    <h3>Move with confidence</h3>
                    <p>Practice technique, mobility, and movement patterns at your own pace.</p>
                </article>
                <article><span>✳</span>
                    <h3>Create healthy habits</h3>
                    <p>Build realistic routines around training, recovery, and daily life.</p>
                </article>
            </div>
        </section>
        <section class="jp-transformation jp-section" id="transformations">
            <div class="jp-heading">
                <div><span class="jp-kicker">SMALL WINS ADD UP</span>
                    <h2>Progress worth <em>celebrating.</em></h2>
                </div>
                <p>Real progress can look different for everyone: consistency, strength, confidence, or simply showing
                    up.</p>
            </div>
            <div class="jp-result-grid">
                <article><img
                        src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?auto=format&fit=crop&w=850&q=85"
                        alt="Athlete training in a gym">
                    <div><span>STRENGTH</span>
                        <h3>Show up. Get stronger.</h3>
                        <p>Celebrate your personal milestones—not someone else's timeline.</p>
                    </div>
                </article>
                <article><img
                        src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=850&q=85"
                        alt="Person stretching after a workout">
                    <div><span>CONSISTENCY</span>
                        <h3>Progress that fits real life.</h3>
                        <p>Build routines that can flex with your schedule and energy.</p>
                    </div>
                </article>
                <article><img
                        src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=850&q=85"
                        alt="Fitness studio with workout equipment">
                    <div><span>CONFIDENCE</span>
                        <h3>Your wins count.</h3>
                        <p>Track how you feel, what you learn, and what you can do today.</p>
                    </div>
                </article>
            </div>
            <p class="jp-demo-note">Images are illustrative, not client transformation evidence. Add only authentic
                testimonials and approved progress stories.</p>
        </section>
        <section class="jp-options">
            <div><span class="jp-kicker">TRAIN YOUR WAY</span>
                <h2>Your schedule.<br><em>Your space.</em></h2>
                <p>Prefer coaching in person or training from home? Tell us what works for you. Available formats and
                    locations will be confirmed with your trainer.</p>
                <div class="jp-option-line"><span>01</span>
                    <div><strong>In-person sessions</strong><small>Technique coaching and guided sessions at an agreed
                            location.</small></div>
                </div>
                <div class="jp-option-line"><span>02</span>
                    <div><strong>Online coaching</strong><small>Remote guidance and plan check-ins, subject to package
                            availability.</small></div>
                </div>
                <div class="jp-option-line"><span>03</span>
                    <div><strong>Hybrid support</strong><small>A mix of live sessions and independent training, where
                            available.</small></div>
                </div>
            </div>
            <div class="jp-options-image"><img
                    src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=1100&q=85"
                    alt="Personal fitness training session"><span class="jp-sticker jp-sticker-pink">ONE DAY<br>OR DAY
                    ONE?</span></div>
        </section>
        <section class="jp-schedule jp-section" id="schedule">
            <div class="jp-heading">
                <div><span class="jp-kicker">MAKE SPACE FOR YOURSELF</span>
                    <h2>Your week, with a little more <em>movement.</em></h2>
                </div>
                <p>Example weekly rhythm. Actual trainer availability and session times are confirmed after inquiry.</p>
            </div>
            <div class="jp-schedule-grid">
                <article><span>MON / WED</span><strong>Strength Foundations</strong><small>Example slots · 07.00 /
                        18.00</small></article>
                <article><span>TUE / THU</span><strong>Personal Coaching</strong><small>Example slots · 08.00 /
                        17.30</small></article>
                <article><span>SATURDAY</span><strong>Reset & Mobility</strong><small>Example slot · 09.00</small>
                </article>
            </div>
            <p class="jp-demo-note">These are sample schedule labels only, not confirmed class times or availability.
            </p>
        </section>
        <section class="jp-articles jp-section">
            <div class="jp-heading">
                <div><span class="jp-kicker">THE FEEL-GOOD FIELD NOTES</span>
                    <h2>Little tips. <em>Big energy.</em></h2>
                </div>
                <p>Helpful content to encourage consistency without pressure.</p>
            </div>
            <div class="jp-article-grid">
                <article><span>01 / STARTING OUT</span>
                    <h3>How to build a routine that sticks</h3>
                    <p>Start with a realistic schedule, repeat the basics, and make room for rest.</p><a
                        href="#booking">Ask your coach ↗</a>
                </article>
                <article><span>02 / RECOVERY</span>
                    <h3>Rest days are part of the plan</h3>
                    <p>Recovery supports adaptation. Your program should include time to recharge.</p><a
                        href="#booking">Ask your coach ↗</a>
                </article>
                <article><span>03 / MINDSET</span>
                    <h3>Track more than the scale</h3>
                    <p>Notice your consistency, technique, energy, and the everyday wins you collect.</p><a
                        href="#booking">Ask your coach ↗</a>
                </article>
            </div>
        </section>
        <section class="jp-testimonials jp-section">
            <div class="jp-heading">
                <div><span class="jp-kicker">GOOD WORDS, GOOD ENERGY</span>
                    <h2>It's about more than <em>reps.</em></h2>
                </div>
                <p>Use this space for genuine client feedback once approved.</p>
            </div>
            <div class="jp-quote"><span class="jp-quote-stars">★★★★★</span>
                <blockquote>“I felt supported from the first session. The plan was clear, realistic, and made me excited
                    to keep going.”</blockquote><strong>Demo client review</strong><small>Replace with a genuine,
                    approved testimonial before publishing.</small>
            </div>
        </section>
        <section class="jp-booking jp-section" id="booking">
            <div class="jp-booking-copy"><span class="jp-kicker">READY WHEN YOU ARE</span>
                <h2>Let's make your<br><em>next move.</em></h2>
                <p>Tell us a little about yourself. We'll prepare a summary so you can continue the conversation with
                    your trainer on WhatsApp.</p>
                <div class="jp-booking-promise"><span>✳</span>
                    <p><strong>No pressure. Just a first step.</strong><small>This is an inquiry, not a confirmed
                            booking. Schedule, availability, and final package details will be confirmed by the
                            trainer.</small></p>
                </div>
            </div>
            <form class="jp-form" id="jpBookingForm">
                <div class="jp-form-head"><span>YOUR FITNESS GOALS</span>
                    <h3>Start with a quick intro.</h3>
                </div>
                <div class="jp-form-row"><label>Your name *<input name="name" required
                            placeholder="Your name"></label><label>WhatsApp number *<input name="phone"
                            type="tel" required placeholder="08xxxxxxxxxx"></label></div>
                <div class="jp-form-row"><label>Program of interest *<select name="package" required>
                            <option value="">Choose a program</option>
                            <option>Fresh Start</option>
                            <option>Power Up</option>
                            <option>Limitless</option>
                            <option>Not sure yet — help me choose</option>
                        </select></label><label>Training format<select name="format">
                            <option>Not sure yet</option>
                            <option>In-person</option>
                            <option>Online</option>
                            <option>Hybrid</option>
                        </select></label></div>
                <div class="jp-form-row"><label>Main goal *<select name="goal" required>
                            <option value="">Choose your goal</option>
                            <option>Build strength</option>
                            <option>Improve fitness and stamina</option>
                            <option>Build consistency</option>
                            <option>Improve movement and technique</option>
                            <option>Other / discuss with coach</option>
                        </select></label><label>Experience level<select name="experience">
                            <option>Beginner</option>
                            <option>Some experience</option>
                            <option>Experienced</option>
                        </select></label></div>
                <div class="jp-form-row"><label>Preferred start date<input name="startDate" id="jpStartDate"
                            type="date"></label><label>Preferred schedule<input name="schedule"
                            placeholder="e.g. weekday evenings"></label></div><label>Anything we should know?
                    <textarea name="message" rows="4" placeholder="Your preferences, questions, or constraints..."></textarea>
                </label>
                <p class="jp-form-note">Please share only information you are comfortable discussing. Your inquiry does
                    not guarantee a session or result.</p><button class="jp-btn jp-btn-dark jp-submit"
                    type="submit">Review & continue to WhatsApp ↗</button>
                <p class="jp-form-status" id="jpFormStatus" role="status" aria-live="polite"></p>
            </form>
        </section>
        <section class="jp-faq jp-section" id="faq">
            <div class="jp-heading">
                <div><span class="jp-kicker">GOOD QUESTIONS</span>
                    <h2>Before you <em>begin.</em></h2>
                </div>
                <p>A few helpful details to make your first step feel easier.</p>
            </div>
            <div class="jp-faq-list">
                <details>
                    <summary>Is this suitable for beginners?<span>+</span></summary>
                    <p>Yes, the programs are designed to start with your current experience and comfort level. Your
                        trainer will discuss suitable exercises and progressions with you.</p>
                </details>
                <details>
                    <summary>How much do the programs cost?<span>+</span></summary>
                    <p>The prices shown in this demo are illustrative promotional examples. Confirm actual rates,
                        session frequency, inclusions, and availability directly with the trainer.</p>
                </details>
                <details>
                    <summary>Can I train online?<span>+</span></summary>
                    <p>Online and hybrid options can be discussed during your inquiry. Availability depends on the
                        trainer's actual service offering.</p>
                </details>
                <details>
                    <summary>Will submitting the form book my session?<span>+</span></summary>
                    <p>No. The form prepares a WhatsApp inquiry. Your session is only scheduled after the trainer
                        confirms availability and the agreed details.</p>
                </details>
            </div>
        </section>
    </main>
    <footer class="jp-footer">
        <div class="jp-footer-main"><a class="jp-brand" href="#home"><span
                    class="jp-logo">J<span>✳</span></span><span><strong>jelly pop</strong><small>PERSONAL TRAINING
                        CLUB</small></span></a>
            <p>Move with joy.<br>Grow at your pace.</p><a class="jp-btn jp-btn-pink" href="#booking">Let's get moving
                ↗</a>
        </div>
        <div class="jp-footer-bottom"><span>© <span id="jpYear"></span> Jelly Pop. All rights
                reserved.</span><span>Made with care ♡ · Website template by WEBIA</span></div>
    </footer>
    <div class="jp-floating-actions"><button type="button" class="jp-float jp-ai" id="jpChatbotButton"
            aria-label="AI Assistant"><span>✳</span> AI Assistant</button><a class="jp-float jp-wa"
            id="jpFloatingWhatsApp" href="#" target="_blank" rel="noopener noreferrer"><span>●</span>
            WhatsApp</a></div>
    <script>
        window.JELLY_POP_CONFIG = {
            whatsappNumber: '6285850180285'
        };
    </script>
    <script src="{{ asset('js/website-bisnis/templates/sports-fitness/personal-trainer/jelly-pop/jelly-pop.js') }}" defer>
    </script>
</body>

</html>
