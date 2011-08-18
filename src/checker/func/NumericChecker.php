<?php

class NumericChecker extends AbstractRegularExpressionChecker {
  protected $regular_expression = '/^[1-9][0-9]*[\.]{0,1}[0-9]$/i';
}
