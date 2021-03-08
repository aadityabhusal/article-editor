<p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0px 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);"><a href="https://www.reddit.com/r/learnprogramming/comments/av3jmm/some_basic_tips_for_newer_programmers_when_it/">Discussion Link</a></p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0px 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);"></p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0px 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">As someone who works in a field where squeezing every last bit of efficiency out of your code. Speed optimization is a pretty important for me. I work in computational physics where I am often working with molecular dynamics, monte carlo, etc. codes that can run for hours using up a 200 CPU cores in a single job. Thus for me 1% inefficiencies are measured in terms of hours.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">I originally told some of these tips in a more verbal format to some newer physics students, but I thought posting a shorter text version of would be good for some newer programmers.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);"><span class="_12FoOEddL7j_RgMQN0SNeU" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">1. Make sure you need optimization in the first place.</span></p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">A common mistake among beginners is that they attempt to optimize a piece of code when they really don't need to.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">A general rule of thumb. Speed optimization only becomes important when the time it takes to write the code is much smaller than the time it takes to run the code. When it's the other way around, then comprehensive speed optimization is generally not required and at that point you should prioritize readability, simplicity, and good code organization more than optimization.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">It doesn't matter if it takes 2ms vs 1ms to run your Python script if you are only going to use it a few times. You could use the script 10,000 times a day and that optimization will only save you 3560 seconds a year (About an hour) in the long run. So if it takes you more than an hour to make said optimization, it isn't worth it.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">Typically if your total run time is in the range of seconds or less don't worry. Now if it is in the range hours, days, weeks, etc. then it can be worth it. That's where a lot of my codes land and thus optimization is important for me.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">An exception might be if you are writing code for something that must complete it's job within a specific amount of time in order to function properly. For example micro-controler programming might be an area this can be important.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);"><span class="_12FoOEddL7j_RgMQN0SNeU" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">2. Learn your profiler tools</span></p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">This will vary depending on which language you use, but pretty much all of the modern programming languages have some some sort of profiling tool or compiler options that allow you to figure out how smoothly your code is running. Compiled languages for example often have compiler flags you can use to output time analytics.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">This will tell you where the bottle necks are which is important to actually improving run times. Always keep in mind. If a part of the code consumes 20% of the total run time of the program, then optimizing that part of the code will generally give you at best a 20% speed up. Though in practice it is often a much lower return than that since 100% optimization isn't always possible. So make sure to focus on the most time consuming parts first.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">If no part of the code is particularly more time consuming than the other then optimization may not be feasible or at least not easy to do.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);"><span class="_12FoOEddL7j_RgMQN0SNeU" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">3. Learn your language specific optimization tools.</span></p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">So if you get through 1 and 2 and realize you do indeed need to optimize your code. The next step is to first ensure you are using the common tools that are easily available to you. These are often libraries that can perform common tasks using well written algorithms. These are usually much better than you can probably come up with on your own since in many cases it is written by people who study these things for a living.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">Compiled languages usually have optimization flags at compile time, Python has libraries such as Numpy to help speed up certain operations, etc. For common operations like matrix opperations common libraries like BLAS, LAPACK, etc. can be helpful. Your language's standard library can have a lot of useful tools for things like sorting arrays or performing search opperations.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">In addition if you are working with languages that allow you to manage your memory. Learning things such as matrix ordering (IE Row Major vs Column Major) can give massive speed ups. For example in many C languages they have a row major ordering. IE this</p><pre class="_3GnarIQX9tD_qsgXkfSDz1" style="margin-top: 4px; margin-bottom: 4px; padding: 8px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: 1.4; font-family: inherit; vertical-align: baseline; background: var(--newRedditTheme-field); max-width: 100%; overflow: auto; display: grid; color: rgb(215, 218, 220);"><code class="_34q3PgLsx9zIU5BiSOjFoM" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 13px; line-height: 20px; font-family: &quot;Noto Mono&quot;, Menlo, Monaco, Consolas, monospace; vertical-align: baseline; color: var(--newRedditTheme-bodyText); background-color: transparent; max-width: 100%; overflow: auto;"> for  i=0; i &lt; N 
     for j=0;  j &lt; N 
          A(i, j) = BLAH
     end for
 end for
</code></pre><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">is often faster than this</p><pre class="_3GnarIQX9tD_qsgXkfSDz1" style="margin-top: 4px; margin-bottom: 4px; padding: 8px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: 1.4; font-family: inherit; vertical-align: baseline; background: var(--newRedditTheme-field); max-width: 100%; overflow: auto; display: grid; color: rgb(215, 218, 220);"><code class="_34q3PgLsx9zIU5BiSOjFoM" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 13px; line-height: 20px; font-family: &quot;Noto Mono&quot;, Menlo, Monaco, Consolas, monospace; vertical-align: baseline; color: var(--newRedditTheme-bodyText); background-color: transparent; max-width: 100%; overflow: auto;"> for  j=0; j &lt; N 
     for i=0;  i &lt; N 
          A(i, j) = BLAH
     end for
 end for
</code></pre><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">Where as in other languages (Fortran for example) it is inverted. This has to do with how memory is physically stored and sent to your processor's cache on your computer. If you are working with a language where you have to manually manage your memory, learning these practices can be helpful.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);"><span class="_12FoOEddL7j_RgMQN0SNeU" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">4. Macro before Micro.</span></p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">Now let's say you get through the easy premade optimization tools and still want to squeeze more out of your code. The next thing to do is to ensure that before you start doing small optimizations, you first ensure you are writing the most efficient algorithms to begin with. An example of a micro change might be something like changing</p><pre class="_3GnarIQX9tD_qsgXkfSDz1" style="margin-top: 4px; margin-bottom: 4px; padding: 8px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: 1.4; font-family: inherit; vertical-align: baseline; background: var(--newRedditTheme-field); max-width: 100%; overflow: auto; display: grid; color: rgb(215, 218, 220);"><code class="_34q3PgLsx9zIU5BiSOjFoM" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 13px; line-height: 20px; font-family: &quot;Noto Mono&quot;, Menlo, Monaco, Consolas, monospace; vertical-align: baseline; color: var(--newRedditTheme-bodyText); background-color: transparent; max-width: 100%; overflow: auto;">          rsq = rx**2 + ry**2 + rz**2
</code></pre><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">to</p><pre class="_3GnarIQX9tD_qsgXkfSDz1" style="margin-top: 4px; margin-bottom: 4px; padding: 8px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: 1.4; font-family: inherit; vertical-align: baseline; background: var(--newRedditTheme-field); max-width: 100%; overflow: auto; display: grid; color: rgb(215, 218, 220);"><code class="_34q3PgLsx9zIU5BiSOjFoM" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 13px; line-height: 20px; font-family: &quot;Noto Mono&quot;, Menlo, Monaco, Consolas, monospace; vertical-align: baseline; color: var(--newRedditTheme-bodyText); background-color: transparent; max-width: 100%; overflow: auto;">          rsq = rx*rx + ry*ry + rz*rz
</code></pre><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">This can give a small speed up sometimes if the compiler or interpreter doesn't substitute the exponent function with multiplication (a cheaper operation), but in practice it's usually only a little bit of a speed up. The best way to improve speed is to improve your algorithm at a macro level first and making sure you aren't performing unnecessary calculations.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">For example, let's say you need to compute the distances between thousands of points which is common in physics engines. You could simply write a loop such as this</p><pre class="_3GnarIQX9tD_qsgXkfSDz1" style="margin-top: 4px; margin-bottom: 4px; padding: 8px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: 1.4; font-family: inherit; vertical-align: baseline; background: var(--newRedditTheme-field); max-width: 100%; overflow: auto; display: grid; color: rgb(215, 218, 220);"><code class="_34q3PgLsx9zIU5BiSOjFoM" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 13px; line-height: 20px; font-family: &quot;Noto Mono&quot;, Menlo, Monaco, Consolas, monospace; vertical-align: baseline; color: var(--newRedditTheme-bodyText); background-color: transparent; max-width: 100%; overflow: auto;">  for  i=0, i&lt;N-1 
     for j=i+1,  j&lt;N 
          rx = posx(i) - posx(j)
          ry = posy(i) - posy(j)
          rz = posz(i) - posz(j)
          rsq = rx*rx + ry*ry + rz*rz
          #Do other stuff
     end for
 end for
</code></pre><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">Which would indeed give you all the distance pairs in the system. However this naive way of doing it is not very good for a huge number of objects. This naive algorithm grows at a rate of O(N<span class="_1jsgSPRO0cMQfs1UZrSovE" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 0.7em; line-height: 0.7em; font-family: inherit; vertical-align: baseline; position: relative; top: -0.4em;">2</span>&nbsp;) and thus will blow up in your face the more objects you have. If you only care about say a situation where two objects smash into each other (game physics for example) then you only need to care when the distances are small enough to cause a collision. If the objects will only interact if they get within a few meters of each other, then it makes little sense to be computing distances when the two objects at several hundred kilometers away from each other. Instead you might use an algorithm like a cell list.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);"><a href="https://en.wikipedia.org/wiki/Cell_lists" class="_3t5uN8xUmg0TOwRCOGQEcU" rel="noopener noreferrer" target="_blank" style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: var(--newCommunityTheme-linkText); text-decoration-line: underline;">https://en.wikipedia.org/wiki/Cell_lists</a></p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">Which goes through and assigns each object to a bin based on their location in the world (an O(N) operation) and then you only need to compute the distances of the objects that are in the same bin or in neighboring bins. This gives a run time that is closer to O(NxM) where M is the number of objects inside of a bin which is usually much much smaller than N. These algorithms perform exceptionally well when the world is sparse (IE most objects are scattered across a large area) and there's even more fancy ones you can find for your purpose.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">Plus if you know that an object isn't going to leave a bin in the next set of calculations (Example a car isn't going fast enough to exit one bin in a single frame.) you only need to update the list periodically instead of every step.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">In general picking better algorithms at a macro level will net the best results in efficiency than making micro-optimizations. Efficiency is like playing a game of golf. You are trying to find the best way to the cup in the least amount of strokes.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);"><span class="_12FoOEddL7j_RgMQN0SNeU" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">5. All else fails, look into parallelization if applicable</span></p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">Creating parallel codes is another option to improve performance if improving single threaded performance is a dead end for you. This can be a pretty open ended study so I probably won't go into too much detail here, but common libraries such as MPI, OpenMP, CUDA, and also the various language specific platforms can help you run your job across multiple threads.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">If you are in need of some serious performance, looking into how to use that expensive GPU you got or that 32 core threadripper in your computer can be helpful.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">Be warned though, it is a lot more intensive to learn how to write good parallel code. But the flip side is also there are job positions for people who are experts in it. So it can be good to have on a resume.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);"><span class="_12FoOEddL7j_RgMQN0SNeU" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">6. It's ok to make micro optimizations, but don't do so at the cost of making your code completely unreadable</span></p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">Even in highly optimized codes, readability is still important. When making more minor changes always make sure you can still read the code at the end of the day and also make sure the micro changes actually give a good speed up. Sometimes what you might think will improve the speed of the code doesn't because the interpreter/compiler does things behind the scene you didn't know about. Always check and compare speeds for any changes you make. Plus make sure you do so in a statistical manner (IE run it more than once and get a good average)</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">Making an optimal mess should be avoided unless there simply is no other way. Which in my experience, is rare.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">Plus always remember, if writing the code is consuming more time than the time saved running the code then it probably isn't worth it. At the end of the day the whole purpose of speeding up your code is to save time. But you aren't saving time if you are wasting it writing the code!</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0.25em; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">Hope that helps.</p><p class="_1qeIAgB0cPwnLhDF9XSiJM" style="margin: 0px; padding: 0.8em 0px 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: &quot;Noto Sans&quot;, Arial, sans-serif; vertical-align: baseline; color: rgb(215, 218, 220); background-color: rgb(26, 26, 27);">(Edit: Removing some redundant points)</p>