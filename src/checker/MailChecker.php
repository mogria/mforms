<?php

class MailChecker extends AbstractRegularExpressionChecker {
  protected $regular_expression = "/^[a-z0-9\.-_]+@[a-z0-9\.-_]+\.[a-z]{2,6}$/i";
}
