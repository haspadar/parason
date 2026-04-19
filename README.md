# Parason

[![PHPStan Level](https://img.shields.io/badge/PHPStan-Level%209-brightgreen)](https://phpstan.org/)
[![Psalm](https://img.shields.io/badge/psalm-level%201-brightgreen)](https://psalm.dev)

Per-file coverage thresholds for PHP.

Global coverage lies. Your project is at 85% while the module you shipped yesterday is at 12% — and nobody notices until production. Parason fails the build when *any* file drops below the threshold, not just the average.

---

## What it does

- Per-file line, branch, and method coverage thresholds — fail on the weakest file, not the mean.
- Reads Clover XML — works with PHPUnit, Pest, Behat, anything that emits Clover.
- Surfaces branch blind spots: files with high line coverage but low branch coverage — tests that touch every line and miss every decision.
- Exit codes for CI.

---

## Installation

```bash
composer require --dev haspadar/parason
```

---

## Usage

```bash
vendor/bin/parason check --clover=coverage.xml --min-line=80 --min-branch=70 --min-method=80
```

Exit `0` if all thresholds pass, `1` if any file violates a threshold, `2` on usage errors.

---

## Why

PHP has no shortage of coverage tooling — and all of it averages. Codecov shows you a green badge at 85%. PHPUnit prints a global percentage. Neither tells you that `src/Payment/Processor.php` has been sitting at 40% for three sprints.

Parason refuses to average. If you set `--min-line=80`, every file meets 80 or the build fails.

---

## Roadmap

- **v0.1** — per-file thresholds from Clover, CLI, CI-friendly exit codes.
- **v0.2** — baseline mode (refuse-drop) + patch coverage against `main`.
- **v0.3** — full path coverage via `sebastian/code-coverage` PHP dump, PHPUnit extension.

---

## License

MIT
